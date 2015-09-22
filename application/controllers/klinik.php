<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Klinik extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('klinik_model');
	}

	public function index($alias=null){
		$this->load->model('klinik_model');
		if(is_null($alias)){
			//kalau null berarti redirect ke search result
			echo "redirect ke home page<br> SEMENTARA INI <br>";
			$hasil = $this->klinik_model->get_all(100,0);
			//print_r($hasil);
			echo "<ul>";
			foreach ($hasil as $h) {
				echo '<li><a href="'.base_url().'klinik/'.$h['alias_klinik'].'">'.$h['nama_klinik'].'</a></li>';
			}
			echo "</ul>";

		}else{
			// Loading the data
			$view_data['info_klinik']=$this->klinik_model->get_by_alias($alias);
			if($view_data['info_klinik']){
				$view_data['dokters']=$this->klinik_model->get_dokter_works_on($view_data['info_klinik']['id_klinik']);

				$this->template->write_view('uppermenu','component/uppermenu');
				$this->template->write_view('sidebar','klinik/sidebar_profil',$view_data);
				$this->template->write_view('content','klinik/content_profil',$view_data);
				// $this->template->my_add_js('my_gmap.js',$view_data);
				$this->template->add_css('assets/css/default.css');
				$this->template->add_css('assets/libs/bootstrap_gallery/css/blueimp_gallery.css');
				$this->template->add_css('assets/libs/bootstrap_gallery/css/bootstrap-image-gallery.min.css');
				// $this->template->add_js('assets/libs/bootstrap_gallery/js/blueimp_gallery.js');
				$this->template->add_js('http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js');
				$this->template->add_js('assets/libs/bootstrap_gallery/js/bootstrap-image-gallery.min.js');

				$this->template->render();
			}else{
				echo "tidak ditemukan klinik dengan nama ".$alias;
			}
		}
	}


	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

		if($this->form_validation->run()===false){
			echo "load image dan set error";
			$view_data['error'] = validation_errors();
			print($view_data['error']);
			$this->template->set_template('template_2');
			$this->template->write_view('uppermenu','component/uppermenu');
			$this->template->write_view('content','klinik/content_login',$view_data);
			$this->template->add_css('assets/css/default.css');
			$this->template->render();
		}else{
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			if($id_klinik = $this->klinik_model->login($email,$password)){
				$this->session->set_userdata('id_klinik',$id_klinik);
				$this->session->set_userdata('logged_in_klinik',true);
				redirect('klinik/dashboard');
			}else{
				redirect('klinik/login');
			}

		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('klinik/login');
	}

	public function settings(){
		if(!$this->session->userdata('logged_in_klinik')){
			redirect('klinik/logout');
		}else if(!$this->session->userdata('id_klinik')){
			redirect('klinik/logout');
		}



		$view_data['active'] = 'settings';
		$view_data['info_klinik'] = $this->klinik_model->get_one($this->session->userdata('id_klinik'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_klinik', 'Nama', 'required|trim|xss_clean');
		$this->form_validation->set_rules('alias_klinik', 'Alias', 'required|trim|callback_cek_alias['.$this->session->userdata('id_klinik').']|xss_clean');
		$this->form_validation->set_rules('email_klinik', 'Nama', 'required|valid_email|trim|xss_clean');
		$this->form_validation->set_rules('password_klinik', 'Nama', 'trim|xss_clean|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Nama', 'trim|xss_clean');
		$this->form_validation->set_rules('alamat_klinik', 'Alamat', 'required|trim|xss_clean');
		$this->form_validation->set_rules('latitude', 'Nama', 'requiredt|rim|xss_clean');
		$this->form_validation->set_rules('longitude', 'Nama', 'required|trim|xss_clean');

		if($this->form_validation->run()===false){
			$view_data['form_value'] = $this->klinik_model->get_one($this->session->userdata('id_klinik'));

			$this->template->write_view('uppermenu','component/uppermenu');
			$this->template->write_view('sidebar','klinik/sidebar_dashboard',$view_data);
			$this->template->write_view('content','klinik/content_settings',$view_data);
			$this->template->add_css('assets/css/default.css');
			$this->template->render();
		}else{
			
			if($this->input->post('password') && $this->input->post('confirm_password')){
				echo "kosong gak sih ? passwordnya ini :".$this->input->post('password');
			}

			$update['nama_klinik']      = $this->input->post('nama_klinik');
			$update['alias_klinik']     = $this->input->post('alias_klinik');
			$update['email_klinik']     = $this->input->post('email_klinik');
			$update['alamat_klinik']    = $this->input->post('alamat_klinik');
			$update['latitude']         = $this->input->post('latitude');
			$update['longitude']        = $this->input->post('longitude');

			$this->klinik_model->update($this->session->userdata('id_klinik'),$update);
			$view_data['message']    = "Your profile updated succesfully";
			$view_data['form_value'] = $this->klinik_model->get_one($this->session->userdata('id_klinik'));

			$this->template->write_view('uppermenu','component/uppermenu');
			$this->template->write_view('sidebar','klinik/sidebar_dashboard',$view_data);
			$this->template->write_view('content','klinik/content_settings',$view_data);
			$this->template->add_css('assets/css/default.css');
			$this->template->render();	
		}
	}	


	public function edit_album(){
		if(!$this->session->userdata('logged_in_klinik')){
			redirect('klinik/logout');
		}else if(!$this->session->userdata('id_klinik')){
			redirect('klinik/logout');
		}
		
		$view_data['active'] = 'album';
		$view_data['info_klinik'] = $this->klinik_model->get_one($this->session->userdata('id_klinik'));

		$this->load->library('form_validation');
		// echo "<pre>";
		// var_dump($this->input->post());
		// echo "</pre>";
		// die();
		if($this->input->post('submit')){

			$config['upload_path']   = realpath(APPPATH.'../assets/klinik_photos');
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite']     = true;
			$config['filename']		 = md5($this->session->userdata('id_klinik'));
			$config['max_size']      = '120';
			$config['max_width']     = '1024';
			$config['max_height']    = '768';
			
			$this->load->library('upload', $config);
			$data_error = null;
			for ($i=1; $i < 6; $i++) { 
				$fieldname = 'foto_'.$i;
				$info = $this->do_upload($fieldname);
				if(!is_null($info)){
					if(array_key_exists('error', $info)){
						$data_error .= $info['error']."<br>";
					}else{
						$update[$fieldname] = base_url().'assets/klinik_photos/'.$info['upload_data']['file_name'];
						$this->klinik_model->update($this->session->userdata('id_klinik'),$update);
					}
				}
			}
			redirect('klinik/edit_album');
		}else{			
			$this->template->write_view('uppermenu','component/uppermenu');
			$this->template->write_view('sidebar','klinik/sidebar_dashboard',$view_data);
			$this->template->write_view('content','klinik/content_edit_album');
			$this->template->add_css('assets/css/default.css');
			$this->template->render();
		}
	}

	private function do_upload($fieldname){
		$info = null;
		if($_FILES and $_FILES[$fieldname]['name']){				
			if ( ! $this->upload->do_upload($fieldname)){
				$info = array('error' => $this->upload->display_errors());
			}else{
				$info = array('upload_data' => $this->upload->data());
			}
		}
		return $info;
	}

	public function dashboard(){
		if(!$this->session->userdata('logged_in_klinik')){
			redirect('klinik/logout');
		}else if ($this->session->userdata('id_klinik')) {
			redirect('klinik/logout');
		}

		$view_data['active'] = 'dashboard';
		$view_data['info_klinik'] = $this->klinik_model->get_one($this->session->userdata('id_klinik'));

		
		$per_page = 10;
		$segment = 3;

		$start = $this->uri->segment($segment);
		// print($start); die();
		$view_data['req_list'] = $this->klinik_model->get_request_on_klinik($this->session->userdata('id_klinik'),$per_page,$start);

		// echo "<pre>";
		// var_dump($res);
		// echo "</pre>";

		$this->load->library('pagination');
		
		$config['base_url'] = base_url('klinik/dashboard');
		$config['total_rows'] = $this->klinik_model->count_get_request_on_klinik($this->session->userdata('id_klinik'));
		$config['per_page'] = $per_page;
		$config['uri_segment'] = $segment;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$view_data['the_pagination'] = $this->pagination->create_links();

		$this->template->write_view('uppermenu','component/uppermenu');
		$this->template->write_view('sidebar','klinik/sidebar_dashboard',$view_data);
		$this->template->write_view('content','klinik/content_dashboard',$view_data);
		$this->template->add_css('assets/css/default.css');
		$this->template->my_add_js('klinik_add_dokter.js');
		$this->template->render();
	}

	public function manajemen_dokter(){
		if(!$this->session->userdata('logged_in_klinik')){
			redirect('klinik/logout');
		}else if ($this->session->userdata('id_klinik')) {
			redirect('klinik/logout');
		}
		
		$view_data['active'] = 'manajemen_dokter';
		$view_data['info_klinik'] = $this->klinik_model->get_one($this->session->userdata('id_klinik'));

		if(($this->input->get('action')=='delete') && $this->input->get('id_dokter')){
			$this->klinik_model->delete_dokter_works_on($this->session->userdata('id_klinik'),$this->input->get('id_dokter'));
		}else if(($this->input->get('action')=='add') && $this->input->get('alias')){
			$this->klinik_model->add_dokter_works_on($this->session->userdata('id_klinik'),$this->input->get('alias'));
		}
		$view_data['dokters'] = $this->klinik_model->get_dokter_works_on($this->session->userdata('id_klinik'));
		$this->template->write_view('uppermenu','component/uppermenu');
		$this->template->write_view('sidebar','klinik/sidebar_dashboard',$view_data);
		$this->template->write_view('content','klinik/content_manajemen_dokter',$view_data);
		$this->template->add_css('assets/css/default.css');
		$this->template->my_add_js('klinik_add_dokter.js');
		$this->template->render();		
	}


	public function cek_alias($alias,$id){
		$info = $this->klinik_model->get_one($id);
		if($alias==$info['alias_klinik']){
			return true;
		}else{
			if(!$this->klinik_model->is_alias_exist($alias)){
				return true;
			}else{				
				return false;
			}
		}
	}

}

/* End of file klinik.php */
/* Location: ./application/controllers/klinik.php */