<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mimin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function login(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('user', 'user', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

		if($this->form_validation->run()){
			$this->input->post('user');
			$this->input->post('password');

			$this->load->model('mimin_model');

			if($this->mimin_model->login($user,$password)){
				$sess['logged_in_admin'] = true;

				$this->session->set_userdata($sess);
				redirect('mimin/dashboard');
			}else{

			}
		}else{
			echo "ini view nya ";
			$this->template->set_template('template_2');
			$this->template->write_view('uppermenu','component/uppermenu');		
			$this->template->write_view('content','mimin/content_login');		
			$this->template->add_css('assets/css/default.css');
			$this->template->render();
		}

	}

	public function dashboard(){
		// if($this->session->userdata('logged_in_admin')){
		// 	redirect('mimin/login');
		// }

		


		$this->template->set_template('template_2');
		$this->template->write_view('uppermenu','component/uppermenu');
		$this->template->write_view('content','mimin/content_dashboard');
		$this->template->add_css('assets/css/default.css');
		$this->template->my_add_js_2('//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js');
		$this->template->add_css('assets/libs/bootstrap_datatables/css/datatables.css');
		$this->template->add_js('assets/libs/bootstrap_datatables/js/datatables.js');
		$this->template->my_add_js('mimindashboard.js');
		$this->template->render();
	}

	public function index(){
		echo "ini mimin index jadi gak ada harusnya periksa lagi url nya bener gak";
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "redirect ke login";
	}


	/*
	* 		  ___             _              _   _          
	* 		 / __|_ _ _  _ __| |  ___ ___ __| |_(_)___ _ _  
	* 		| (__| '_| || / _` | (_-</ -_) _|  _| / _ \ ' \ 
	* 		 \___|_|  \_,_\__,_| /__/\___\__|\__|_\___/_||_|
	*
	**/

	function dokter_datatables(){
		$this->load->library('datatables');
		$this->datatables->select('id_dokter,nama_dokter,email_dokter,alias,active_untill')
						->unset_column('id_dokter')
						->add_column('Action',$this->aksi_dokter_table('$1'),'id_dokter')
						->from('dokter');
		echo $this->datatables->generate();
	}

	private function aksi_dokter_table($id){
		$this->load->helper('url');

		$html = '<span class="actions">';
		$html .= '<a class="btn btn-sm btn-primary edit_button_dokter" href="#" id="dokter_edit_'.$id.'"><span class="glyphicon glyphicon-edit"></span></a> &nbsp;';
		$html .= '<a class="btn btn-sm btn-danger delete_button_dokter" href="#" id="dokter_delete_'.$id.'"><span class="glyphicon glyphicon-remove"></span></a>';
		$html .= '</span>';
		return $html;
	}






	function pasien_datatables(){
		$this->load->library('datatables');
		$this->datatables->select('id_pasien,nama_pasien,email_pasien,no_hp,last_login')
						->unset_column('id_pasien')
						->add_column('Action',$this->aksi_pasien_table('$1'),'id_pasien')
						->from('pasien');
		echo $this->datatables->generate();
	}

	private function aksi_pasien_table($id){
		$this->load->helper('url');

		$html = '<span class="actions">';
		$html .= '<a class="btn btn-sm btn-primary" href="#" id="pasien_edit_'.$id.'"><span class="glyphicon glyphicon-edit"></span></a> &nbsp;';
		$html .= '<a class="btn btn-sm btn-danger" href="#" id="pasien_delete_'.$id.'"><span class="glyphicon glyphicon-remove"></span></a>';
		$html .= '</span>';
		return $html;
	}

}
/* End of file mimin.php */
/* Location: ./application/controllers/mimin.php */