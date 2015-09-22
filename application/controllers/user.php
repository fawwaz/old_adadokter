<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pasien_model');
	}

	public function login(){
		$this->load->library('facebook');
		$view_data['fb_login_url'] = $this->facebook->getLoginUrl(
			array(
				'redirect_uri' => base_url('user/fb_login'),
				'scope'        => array("email") // permissions here
			)
		);

		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}else{
			$this->load->helper('form');
			$this->load->view('user/login',$view_data);
		}
	}

	public function twitter_login(){

		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}else if($this->session->userdata('tw_status')=='verified'){
			redirect('user/logout','refresh');
		} 


		$this->load->library('twconnect');
		$ok = $this->twconnect->twredirect('user/callback_twitter');
		if(!$ok){
			//$this->session->sess_destroy();
			echo "error";
		}
	}

	public function callback_twitter(){
		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}

		$this->load->library('twconnect');

		$ok = $this->twconnect->twprocess_callback();

		if($ok){
			echo 'check udah registrasi belum sih kalau udah registrasi redirect langsung';
			echo '<a href='.base_url().'user/logout'.'>LOGOUT</a><br>';
			$this->twconnect->twaccount_verify_credentials();
			
			
			$user_info    = $this->twconnect->tw_user_info;
			$id_user      = $this->pasien_model->get_id_user_from_social_id($user_info->id_str);
			$no_hp_pasien = $this->pasien_model->get_no_hp_pasien($id_user);

			$this->session->set_userdata('id_pasien',$id_user);
			$this->session->set_userdata('social_id',$user_info->id_str);
			$this->session->set_userdata('social_image_url',$user_info->profile_image_url);
			$this->session->set_userdata('social','twitter');
			$this->session->set_userdata('no_hp',$no_hp_pasien);
			
			if($this->pasien_model->is_social_registered($user_info->id_str,'twitter')){
				// sudah pernah register berarti lanjutkan
				if($this->pasien_model->is_verified($user_info->id_str,'twitter')){
					$this->session->set_userdata('logged_in_user',true);
					$this->session->set_userdata('group','pasien');

					// cek dulu pernah di set gak sih redirect ke arah mana 

					if($this->session->userdata('after_url')){
						$redirect = $this->session->userdata('after_url');
						$this->session->unset_userdata('after_url');
						

						redirect($redirect);
					};

					redirect('user/dashboard');
				}else{
					echo "sudah terdaftar tapi belum terverifikasi nomor handphonenya";
					redirect('user/phone_verification');//,'refresh');
				}
			}else{
				$this->session->set_flashdata('from','callback_twitter');
				redirect('user/complete_registration');
			}
			
		}else{
			//$this->session->sess_destroy();
			$this->session->set_flashdata('message','Error login with twitter, contact the administrator');
			//session dstryo too
			//NOT
			// redirect('user/logout');
		}
	}
	
	public function complete_registration(){
		// Hati hati jika user langsung megakses url ini tanpa melalui login.
		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}else if($this->session->flashdata('from')!='callback_twitter'){
			redirect('user/logout');
		}

		$this->session->set_flashdata('from','complete_registration');
		echo "complete registration by giving email and phone number verified";
		$this->load->view('user/register','refresh');
	}



	public function do_register(){
		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}else if(!$this->session->userdata('social_id')){
			redirect('user/logout');
		}
		


		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','required|xss_clean');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[pasien.email_pasien]|xss_clean');
		$this->form_validation->set_rules('no_hp','Nomor handphone','required|xss_clean|numeric');

		if($this->form_validation->run()==false){
			redirect('user/complete_registration','refresh');
		}else{
			date_default_timezone_set('Asia/Jakarta');
			$random_number = sprintf("%0d", mt_rand(1, 999999));

			$sess['nama_pasien']  = $this->input->post('nama');
			$sess['email_pasien'] = $this->input->post('email');
			$sess['no_hp']        = '+62'.$this->input->post('no_hp');
			$sess['reg_date']     = date('Y-m-d H:i:s');
			$sess['sms_code']     = $random_number;
			$sess['id_pasien']    = $this->pasien_model->insert($sess); // lakukan insert ke database 
			$this->session->set_userdata($sess);  // It would be better if you wrap it inside try catch block
			
			$update['social_id'] = $this->session->userdata('social_id');
			$update['social']    = $this->session->userdata('social');
			$this->pasien_model->update($sess['id_pasien'],$update);

			$this->load->library('twilio');
			$this->config->load('twilio');
			$from    = $this->config->item('number');
			$to      = $sess['no_hp'];
			$message = "Selamat datang di www.AdaDokter.com,kode verifikasi anda adalah ".$random_number;
			$respon  = $this->twilio->sms($from,$to,$message);

			if($respon->IsError){
				$this->session->set_flashdata('message','error sending message. Contact The administrator email');
				redirect('user/complete_registration');
			}else{
				redirect('user/phone_verification');
			}
		}
	}

	public function do_verify_phone(){
		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}if(!$this->session->userdata('social_id')){
			redirect('user/logout');
		}
		

		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode_verifikasi','Kode verifikasi','required|xss_clean');

		if($this->form_validation->run()==false){
			echo "failed to verify redirect to ... or set flash message, retry";
		}else{
			$sms_code = $this->input->post('kode_verifikasi');
			$social   = $this->session->userdata('social');
			$valid_code = $this->pasien_model->get_sms_code_from_social_id($this->session->userdata('social_id'),$social);
			
			if($sms_code==$valid_code){
				//succes verify update d database agar sms code = verifyed 0 redirect login
				$id_pasien = $this->pasien_model->get_id_user_from_social_id($this->session->userdata('social_id'),$social);

				$update['join_date']  = date('Y-m-d H:i:s'); // Join date defined as the date when he activated but reg date is the date when he register
				$update['sms_code']   = 'verified';
				$this->pasien_model->update($id_pasien,$update);

				if($this->input->is_ajax_request()){
					$this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>'success')));
				}else{
					// Succes logged in
					$this->session->set_userdata('logged_in_user',true);
					$this->session->set_userdata('group','pasien');
					redirect('user/dashboard','refresh');
				}
			}else{
				// set flash message that you are wrong try again.
				if($this->input->is_ajax_request()){
					$this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>'failed','message'=>'check again the verification code','sms_code'=>$this->session->userdata('social_id'))));
				}else{
					$this->session->set_flashdata('message','Kode verifikasi tidak tepat, cek lagi hanphone anda.');
					redirect('user/phone_verification','refresh');
				}
			}
		}

	}

	public function do_update_phone_registration(){
		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}if(!$this->session->userdata('social_id')){ // kalau social id ga ada redirect ke logout
			redirect('user/logout');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_hp_update','required');
		
		
		if($this->form_validation->run()){
			$random_number = sprintf("%0d", mt_rand(1, 999999));
			
			$social_id = $this->session->userdata('social_id');
			$id_user   = $this->pasien_model->get_id_user_from_social_id($social_id);
			

			$update['sms_code'] = $random_number;
			$update['no_hp']    = '+62'.$this->input->post('no_hp_update');
			$this->session->set_userdata($update);
			$this->pasien_model->update($id_user,$update);

			$this->load->library('twilio');
			$this->config->load('twilio');
			$from    = $this->config->item('number');
			$to      = $update['no_hp'];
			$message = "Selamat datang di www.AdaDokter.com,kode verifikasi baru anda adalah ".$random_number;
			$respon  = $this->twilio->sms($from,$to,$message);

				
			redirect('user/phone_verification','refresh');
		}else{
			//set flash message tha failed
			echo validation_errors();
			//echo $this->input->get('no_hp_update');
		}

	}

	public function resend(){
		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}

		echo "verify that user is accesed ths method from ... and the session user data is already setted";
		$this->load->view('user/update_phone');
	}

	public function dashboard(){
		// echo "you are in the dashboard but check dulu udah logged in atau belum kalau belum redirect ke user/login";
		// echo "<pre>";
		// print_r($this->session->all_userdata());
		// echo "</pre>";
		if(!$this->session->userdata('logged_in_user')){
			redirect('user/login');
		}


		$user_info = $this->pasien_model->get_one($this->session->userdata('id_pasien'));

		$view_data['foto_user'] = $this->session->userdata('social_image_url');
		$view_data['nama_user'] = $user_info['nama_pasien'];

		$view_data['req_list'] = $this->pasien_model->get_request($this->session->userdata('id_pasien'));

		// $this->load->view('page',$view_data);

		$this->template->set_template('template_2');
		$this->template->write_view('uppermenu','user/uppermenu_dashboard',$view_data);
		$this->template->write_view('content','user/content_dashboard',$view_data);
		$this->template->add_css('assets/css/default.css');
		$this->template->render();
	}

	public function phone_verification(){
		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}

		$this->load->helper('url');
		$this->load->view('user/phone_verification');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/user/login');
	}

	public function anset(){
		$this->session->unset_userdata('social_id');
	}

	public function settings(){
		$user_info = $this->pasien_model->get_one($this->session->userdata('id_pasien'));

		$view_data['foto_user'] = $this->session->userdata('social_image_url');
		$view_data['nama_user']    = $user_info['nama_pasien'];
		$view_data['email_pasien'] = $user_info['email_pasien'];
		$view_data['no_hp']        = $user_info['no_hp'];
		// $this->load->view('user/setting',$view_data);

		$this->template->set_template('template_2');
		$this->template->write_view('uppermenu','user/uppermenu_dashboard',$view_data);
		$this->template->write_view('content','user/content_settings',$view_data);
		$this->template->add_css('assets/css/default.css');
		$this->template->render();
	}

	public function do_update_profile(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('no_hp','Nomor Handphone','numeric|xss_clean');
		$this->form_validation->set_rules('nama_pasien','Nama ','xss_clean');
		$this->form_validation->set_rules('email_pasien','Email ','valid_email|xss_clean');

		if($this->form_validation->run()==false){
			$this->session->set_flashdata('error',validation_errors());
			redirect('user/settings',$view_data);
		}else{
			$data['nama_pasien']  = $this->input->post('nama_pasien');
			$data['email_pasien'] = $this->input->post('email_pasien');
			$data['no_hp']        = $this->input->post('no_hp');
			$this->pasien_model->update($this->session->userdata('id_pasien'),$data);
			$this->session->set_flashdata('success','anda berhasil mengupdate profil');
			redirect('user/settings',$view_data);
		}

	}

	public function fb_login(){
		//BACKUP http://pastebin.com/8xJySBZH
		if($this->session->userdata('logged_in_user')){
			redirect('user/dashboard');
		}

		$this->load->helper('url_helper');
		$this->load->library('oauth2/oauth2');
		$this->config->load('facebook');
		
		$provider = $this->oauth2->provider('facebook', array(
		    'id' => $this->config->item('appId'),
		    'secret' => $this->config->item('secret')
		));

		if ( ! $this->input->get('code'))
		{
		    // By sending no options it'll come back here
		    $provider->authorize();
		}
		else
		{
		    // Howzit?
		    try
		    {
				$token        = $provider->access($_GET['code']);
				$user_info    = $provider->get_user_info($token);
				
				$id_user      = $this->pasien_model->get_id_user_from_social_id($user_info['uid']);
				$no_hp_pasien = $this->pasien_model->get_no_hp_pasien($id_user);

				$this->session->set_userdata('id_pasien',$id_user);
				$this->session->set_userdata('social_id',$user_info['uid']);
				$this->session->set_userdata('social_image_url',$user_info['image']);
				$this->session->set_userdata('social','facebook');
				$this->session->set_userdata('no_hp',$no_hp_pasien);
		        
				if($this->pasien_model->is_social_registered($user_info['uid'],'facebook')){
					// sudah pernah register berarti lanjutkan
					if($this->pasien_model->is_verified($user_info['uid'],'facebook')){
						$this->session->set_userdata('logged_in_user',true);
						$this->session->set_userdata('group','pasien');

						// cek dulu pernah di set gak sih redirect ke arah mana 
						if($this->session->userdata('after_url')){
							$redirect = $this->session->userdata('after_url');
							$this->session->unset_userdata('after_url');
							redirect($redirect);
						};

						redirect('user/dashboard');
					}else{
						echo "sudah terdaftar tapi belum terverifikasi nomor handphonenya";
						redirect('user/phone_verification');//,'refresh');
					}
				}else{
					$this->session->set_flashdata('from','callback_twitter');
					redirect('user/complete_registration');
				}

		        // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
		        // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
		        echo "<pre>Tokens: ";
		        var_dump($token);

		        echo "\n\nUser Info: ";
		        var_dump($user);
		    }

		    catch (OAuth2_Exception $e)
		    {
		    	// redirect ke login set errormessage with flash data
		        show_error('That didnt work: '.$e);
		    }

		}

	}

	public function cancel_request(){
		$id_request = $this->input->get('id_request');
		$this->pasien_model->cancel_request($id_request);
		$this->session->set_flashdata('success','Berhasil mengcancel request');
		redirect('user/dashboard');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */