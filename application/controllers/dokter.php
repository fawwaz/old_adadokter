<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('dokter_model');
	}

	public function index($alias=null)
	{

		if(is_null($alias)){
			// echo "redirect to home"."<br> SEMENTARA INI <br>";
			// $hasil = $this->dokter_model->get_all_with_klinik(100,0);
			// echo "<ul>";
			// foreach ($hasil as $h) {
			// 	// echo '<li><a href="'.base_url().'dokter/'.$h['alias'].'">'.$h['nama_dokter'].'</a></li>';
			// 	print_r($h);
			// 	echo "<br>";
			// }
			// echo "</ul>";

			


		}else{
			// Loading the data
			$view_data['info_dokter'] = $this->dokter_model->get_by_alias($alias);
			if($view_data['info_dokter']){

				$view_data['where_works'] = $this->dokter_model->get_where_works($view_data['info_dokter']['id_dokter']);
				//output the result
			

				// echo "Id Dokter".$hasil1['id_dokter']."<br>";
				// echo "---- INFORMASI DOKTER ----<br>";
				// foreach ($view_data['info_dokter'] as $key => $value) {
				// 	echo $key . ":". $value."<br>";
				// }
				// echo "---- BEKERJA DI ----<br>";
				// foreach ($view_data['where_works'] as $h) {
				// 	echo '<a href="'.base_url().'klinik/'.$h['alias_klinik'].'">'.$h['nama_klinik'].'</a>';
				// }


				// $this->load->view('profil',$view_data);

				$this->template->write_view('uppermenu','component/uppermenu');
				$this->template->write_view('sidebar','component/sidebar_profil',$view_data);
				$this->template->write_view('content','dokter/content_profil',$view_data);
				$this->template->my_add_js('my_calendar.js',$view_data);
				$this->template->my_add_js('my_gmap.js',$view_data);
				$this->template->add_css('assets/css/default.css');
				$this->template->render();
			}else{
				echo "tidak ditemukan alias dokter dengan nama ".$alias;
			}
		}



		
	}


	public function login(){
		$this->load->helper('form');
		// $this->load->view('dokter/login');
		$this->template->set_template('template_2');
		$this->template->write_view('uppermenu','component/uppermenu');
		$this->template->write_view('content','dokter/content_login');
		$this->template->add_css('assets/css/default.css');
		$this->template->render();
	}

	public function do_login(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email','Email','required|xss_clean');
		$this->form_validation->set_rules('password','Password','required|xss_clean');

		if($this->form_validation->run()){
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			$this->load->model('dokter_model');
			if($id_dokter=$this->dokter_model->login($email,$password)){
				// check again if user is active untill from now
				$sess['id_dokter'] = $id_dokter;
				$sess['group']     = 'dokter';
				$sess['logged_in'] = true;
				$this->session->set_userdata($sess);
				// update last login too
				// echo "success login";
				redirect('dokter/dashboard');
			}else{
				// echo "failed to login redirect to dokter/login set flashdata"; increase number of try
				
				$this->session->set_flashdata('error',"Neither email and password incorrect or your account is expired, Contact the administrator to extend your active period");
				redirect('dokter/login');
			}
		}else{
			$this->session->set_flashdata('error',validation_errors());
			redirect('dokter/login');
		}
	}

	public function logout(){
		$sess['id_dokter'] = '';
		$sess['group']     = '';
		$sess['logged_in'] = false;
		$this->session->unset_userdata($sess);
		$this->session->sess_destroy();
		redirect('dokter/login');
	}

	public function register(){
		$this->load->library('form_validation');
		$this->load->library('recaptcha');
		$this->form_validation->set_rules('nama_calon','Nama','required|xss_clean');
		$this->form_validation->set_rules('email_calon','Email','required|xss_clean|valid_email');
		$this->form_validation->set_rules('alamat_calon','Alamat','required|xss_clean|');
		$this->form_validation->set_rules('no_hp_calon','Nomor Handphone','required|xss_clean|numeric');

		if($this->form_validation->run()){
			// $this->recaptcha->recaptcha_check_answer();
			// if($this->recaptcha->getIsValid()){
				$insert['nama_calon']   = $this->input->post('nama_calon');
				$insert['email_calon']  = $this->input->post('email_calon');
				$insert['alamat_calon'] = $this->input->post('alamat_calon');
				$insert['no_hp_calon']  = '+62'.$this->input->post('no_hp_calon');
				print_r($insert);
				$this->load->database();
				$this->db->insert('calon_dokter',$insert);
				$this->session->set_flashdata('success','Selamat anda telah terdaftar, kami akan meghubungi anda dalam waktu sekitar 3 hari kedepan');
				// redirect('');
			// }else{
				// $this->session->set_flashdata('error','The recaptcha code you entered is not match with the image');
				// redirect('dokter/register');
			// }

		}


		$this->session->set_flashdata('error',validation_errors());
		$view_data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
		$this->load->helper('form');
		$this->template->set_template('template_2');
		$this->template->write_view('uppermenu','component/uppermenu');
		$this->template->write_view('content','dokter/content_register',$view_data);
		$this->template->add_css('assets/css/default.css');
		$this->template->render();
	}

	

	public function dashboard(){
		$this->load->helper('form');
		$logged_in = $this->session->userdata('logged_in');
		$group     = $this->session->userdata('group');
		$view_data['active'] = 'dashboard';
		if($logged_in){
			if($group=='dokter'){
				$id_dokter = $this->session->userdata('id_dokter');
				$view_data['unconfirmed']   = $this->dokter_model->get_unconfirmed_antrian($id_dokter);
				$view_data['today_antrian'] = $this->dokter_model->get_today_antrian_list($id_dokter);
				$view_data['info_dokter']  = $this->dokter_model->get_one($this->session->userdata('id_dokter'));
				$view_data['req_list'] = $this->dokter_model->get_request($this->session->userdata('id_dokter'));
				// echo "<pre>";
				// echo "iddokter".$this->session->userdata('id_dokter');
				// print_r($view_data['req_list']);
				// echo "</pre>";
				// die();
				//success
				
				// $this->load->view('dokter/dashboard',$view_data);
				$this->template->write_view('uppermenu','component/uppermenu');
				$this->template->write_view('sidebar','dokter/sidebar_dashboard',$view_data);
				$this->template->write_view('content','dokter/content_dashboard',$view_data);				
				$this->template->add_css('assets/css/default.css');
				$this->template->my_add_js('dashboard_dok.js',$view_data);
				$this->template->render();
			}else{
				echo "You dont have any privillage to view this page";
				show_404();
			}
		}else{
			echo "you should login to see this page <br> redirect to login page";
			redirect('dokter/login','refresh');
		}
	}

	public function view_request(){
		$hasil = $this->dokter_model->get_request(5);
		foreach ($hasil as $h) {
			print_r($h);
		}
	}

	public function do_request(){
		if($this->session->userdata('id_pasien')){
			echo "dokter juga gak boleh akses ini biar gak bingung";
			// redirect('user/login');	
		}


		$this->load->library('form_validation');

		$this->form_validation->set_rules('jadwal','Pilihan jadwal','required|xss_clean');

		$request_dokter = $this->input->post();

		if($this->form_validation->run()){
			$this->session->set_userdata('request_dokter',$request_dokter);
			
			if(!$this->session->userdata('logged_in_user')){
				$this->session->set_userdata('after_url',$request_dokter['alias']);
				$this->session->set_userdata('after_message','Now You Should Choose Again');
				redirect('user/login');
			}else{
				$this->load->model('dokter_model');

				$data['id_pasien'] = $this->session->userdata('id_pasien');
				$data['id_dokter'] = $request_dokter['id_dokter'];
				$data['id_klinik'] = $request_dokter['id_klinik'];
				$data['status'] = 'req';
				$data['tanggal_jam'] = $request_dokter['req_jadwal'];

				$this->session->set_userdata('request_data',$data);

				$this->session->set_flashdata('from','dokter_page');
				redirect('dokter/checkout');


				echo "set flash message bahwa telah ditambahkan. klik disini untuk cancel";
				echo "kirim sms ke hp user bahwa anda telah dikonfirm oleh dokter ";
				echo "kirim sms J-2 sebelum deadline insert juga ke queue sms";
			}
		}else{
			$this->session->set_flashdata('after_message','Anda belum memilih jadwal');
			redirect($request_dokter['alias']);
			//echo "redirect ke halaman dokter yang tadi dengan set message anda harus memilih jadwal terlebih dahulu";
		}

	}

	public function checkout(){
		if(!$this->session->userdata('logged_in_user')){
			redirect('user/login');
		}
		if($request_data = $this->session->userdata('request_data')){

			// hati hati kalau akses belum login redirect login cek dulu kalau 
			$this->load->library('recaptcha');
			$view_data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
			$info_dokter = $this->dokter_model->get_info_dokter_lengkap($request_data['id_dokter']);

			$view_data['nama_dokter']   = $info_dokter['nama_dokter']; 
			$view_data['alamat_klinik'] = $info_dokter['alamat_klinik'];
			
			$tanggal_jam                = explode(" ", $request_data['tanggal_jam']);
			$view_data['tanggal']       = $tanggal_jam[0];
			$view_data['jam']           = $tanggal_jam[1];
			$this->load->view('user/confirm_request',$view_data);
		}else{
			echo "redirect ke list of dokter set message anda belum memilh jadwal";
		}
	}

	public function do_checkout(){
		$this->load->library('recaptcha');

		$this->recaptcha->recaptcha_check_answer();
		if($this->recaptcha->getIsValid()){
			// insert request ke dalam database
			// lebih bagus kalau make transaction sql

			$request_data = $this->session->userdata('request_data');
			$this->dokter_model->insert_request($request_data);

			$this->load->library('twilio');
			$from    = $this->config->item('number');
			$to 	 = $this->session->userdata('no_hp');
			$message = 'anda telah memesan Nama dokter pada tanggal sekian di lokasi';
			$respon = $this->twilio->sms($from,$to,$message);

			// deteksi kesalahan jika salah 
			// kirim sms dan redirect ke dashboard user
			// add dokter to favorit user
			// unset userdata juga
			$this->session->unset_userdata('request_data');
			if($respon->isError){
				echo "ada kesalahan dalam pengiriman sms, tetapi data anda sudah kami masukan";
			}else{
				redirect('user/dashboard');
			}
		}else{
			//set flash message kode gambar tidak tepat
			redirect('dokter/checkout');
		}
	}

	public function panel2(){
		$this->load->view('profil2');
	}

	public function settings(){
		$this->load->view('dokter/settings');

	}


	public function update(){
		$this->load->helper('form');
		if($this->session->userdata('id_dokter')==false){
			redirect('dokter/login');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_dokter','Nama dokter','required|xss_clean|trim');
		$this->form_validation->set_rules('email_dokter','Email','required|xss_clean|trim');
		$this->form_validation->set_rules('password_dokter','Password','xss_clean|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password','Password Confirmation','xss_clean');
		$this->form_validation->set_rules('statement','Personal Statement','required|xss_clean|trim');
		$this->form_validation->set_rules('alias','Alias','required|xss_clean|callback_cek_alias['.$this->session->userdata('id_dokter').']|trim');
		// $this->form_validation->set_rules('profile_pic','Profile Picture','required');
		// $this->form_validation->set_rules('metode','Metode urutan','required');
		
		$view_data['info_dokter'] = $this->dokter_model->get_one($this->session->userdata('id_dokter'));
		$view_data['active'] = 'settings';
		if($this->form_validation->run()==false){
			$view_data['form_value'] = $this->dokter_model->get_one($this->session->userdata('id_dokter')); // if validation error then replace the form value
			
			// $this->load->view('dokter/settings',$view_data);
			$this->template->write_view('uppermenu','component/uppermenu');
			$this->template->write_view('sidebar','dokter/sidebar_dashboard',$view_data);
			$this->template->write_view('content','dokter/content_settings',$view_data);
			$this->template->add_css('assets/css/default.css');
			$this->template->render();
		}else{
			if($_FILES and $_FILES['profile_pic']['name']){				
				// Cek jika dia melakukan replace terhadap file yang diupload
				$config['upload_path']   = realpath(APPPATH.'../assets/photos');
				$config['allowed_types'] = 'jpg|jpeg';
				$config['max_size']      = '100';
				$config['max_width']     = '400';
				$config['max_height']    = '600';
				$config['filename']		 = md5($this->session->userdata('id_dokter')).'.jpg';
				$config['overwrite']     = true;


				if(!$this->upload->do_upload('profile_pic')){
					// fail to upload
					$view_data['error'] = $this->upload->display_errors();
					$view_data['form_value'] = $this->dokter_model->get_one($this->session->userdata('id_dokter')); // if validation error then replace the form value
					// $this->load->view('dokter/settings',$view_data);
					$this->template->write_view('uppermenu','component/uppermenu');
					$this->template->write_view('sidebar','dokter/sidebar_dashboard',$view_data);
					$this->template->write_view('content','dokter/content_settings',$view_data);
					$this->template->add_css('assets/css/default.css');
					$this->template->render();
				}else{
					$file_info  = $this->upload->data();					
					// $update['profile_pic'] = $file_info['full_path'];
					$update['profile_pic'] = base_url().'assets/photos/'.$file_info['file_name'];
				}				
			}

			// if the input doe'nt include the file info
			if($this->input->post('password') && $this->input->post('confirm_password')){
				$update['password_dokter'] = $this->input->post('password');
			}

			$update['nama_dokter']    = $this->input->post('nama_dokter');
			$update['email_dokter']   = $this->input->post('email_dokter');
			$update['statement']      = $this->input->post('statement');
			$update['alias']          = $this->input->post('alias');
			$update['metode_antrian'] = $this->input->post('metode');

			$this->dokter_model->update($this->session->userdata('id_dokter'),$update);

			$view_data['message']    = "Your profile updated succesfully";
			$view_data['form_value'] = $this->dokter_model->get_one($this->session->userdata('id_dokter'));
			// $this->load->view('dokter/settings',$view_data);
			$this->template->write_view('uppermenu','component/uppermenu');
			$this->template->write_view('sidebar','dokter/sidebar_dashboard',$view_data);
			$this->template->write_view('content','dokter/content_settings',$view_data);
			$this->template->add_css('assets/css/default.css');
			$this->template->render();
		}
	}	

	public function cek_alias($alias,$id){
		$info = $this->dokter_model->get_one($id);
		if($alias==$info['alias']){
			return true;
		}else{
			if(!$this->dokter_model->is_alias_exist($alias)){
				return true;
			}else{
				return false;
			}
		}
	}

	public function confirm_request(){
		$id_request   = $this->input->get('id_request');
		$info_request = $this->dokter_model->get_request_by_id_request($id_request);
		$no_hp        = $this->dokter_model->confirm_request($id_request);

		$this->load->library('twilio');
		$this->config->load('twilio');
		$from = $this->config->item('number');
		$to = $no_hp;
		$message = 'Anda telah dikonfirmasi oleh dokter untuk hadir pada ';

		$this->twilio->sms($from,$to,$message);

		$this->session->set_flashdata('message','successfully confirmed');
	}

	public function delete_request(){
		$id_request = $this->input->get('id_request');
		$this->load->database();
		$this->db->delete('request',array('id_request',$id_request));
	}

	public function update_jadwal(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('kerja_from[]','Waktu awal kerja','required|xss_clean');
		$this->form_validation->set_rules('kerja_to[]','Waktu akhir kerja','required|xss_clean');
		$view_data['active'] = 'scheduling';
		$view_data['info_dokter'] = $this->dokter_model->get_one($this->session->userdata('id_dokter'));
		if($this->form_validation->run()==false){
			// $this->load->view('dokter/jadwal');
			$this->template->write_view('uppermenu','component/uppermenu');
			$this->template->write_view('sidebar','dokter/sidebar_dashboard',$view_data);
			$this->template->write_view('content','dokter/content_scheduling',$view_data);
			$this->template->add_css('assets/css/default.css');
			$this->template->my_add_js('time_pick_dok.js',$view_data);
			$this->template->render();
		}else{
			$input  = $this->input->post();
			$output = array();
			foreach ($input['kerja_from'] as $key => $value) {
				$output[] = $value;
			}

			for ($i=0; $i <count($input['kerja_to']) ; $i++) { 
				$output[$i] = $output[$i] . '-'. $input['kerja_to'][$i];
			}

			$output_string = '';
			foreach ($output as $key => $value) {
				print_r($value);
				$output_string = $output_string.$value.';';
			}

			// $output_string = rtrim(";",$output_string);
			// kalau lebih dari satu substring saja
			// if(count($input['kerja_from'])>1){
			$output_string=substr($output_string, 0,-1);
			// }
			

			// $output string is ready for input now
			$update['day1'] = $output_string;
			$update['day2'] = $output_string;
			$update['day3'] = $output_string;
			$update['day4'] = $output_string;
			$update['day5'] = $output_string;
			$update['day6'] = $output_string;
			$update['day7'] = $output_string;

			$this->dokter_model->update($this->session->userdata('id_dokter'),$update);

		}
	}
}

/* End of file dokter.php */
/* Location: ./application/controllers/dokter.php */