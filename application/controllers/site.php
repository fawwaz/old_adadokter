<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->template->set_template('template_2');
	}

	public function index(){

		echo $this->session->flashdata('success');
		$this->template->write_view('uppermenu','component/uppermenu');
		$this->template->write_view('content','component/content_home');
		$this->template->add_css('assets/css/default.css');
		$this->template->my_add_js('toggle_login.js');
		$this->template->render();


		// echo "mending awalnya kaya website google aja cuma ada search bar <br> tapi ada how it works siapa kita, terus ada form apakah anda dokter ? silahkan masukan kami akan menghubung anda <br>";
		// echo "anda ada di home lho minimal gak blank nanti ditambahin deh ada juga search yang harus disempurnakan list yang alvailable";
	}

	public function contact(){
		echo "contact us here form and google maps and phone number";
	}

	public function ask(){
		echo " coming soon .. if you believe that this site is helpful , spread us to the world";
	}

	
	public function direktori_dokter(){
		$this->load->model('dokter_model');
		$this->load->helper('form');
		
		$per_page = 5;
		$segment  = 3;
		$start    = $this->uri->segment($segment);



		if($keyword = $this->input->post('keyword')){
			$view_data['dokters'] = $this->dokter_model->find_by_name($keyword,$per_page,$start);
			$total_rows = $this->dokter_model->count_find_by_name($keyword);
		}else{
			$view_data['dokters'] = $this->dokter_model->get_all_with_klinik($per_page,$start);
			$total_rows           = $this->dokter_model->count_get_all_with_klinik();
		}


		$this->load->library('pagination');
		$config['base_url']        = base_url('site/direktori_dokter');
		$config['total_rows']      = $total_rows;
		$config['per_page']        = $per_page;
		$config['uri_segment']     = $segment;
		$config['full_tag_open']   = "<ul class='pagination'>\n";
		$config['full_tag_close']  = "</ul>";
		$config['next_link']       = "&raquo;";
		$config['next_tag_open']   = "<li>";
		$config['next_tag_close']  = "</li>\n";
		$config['prev_link']       = "&laquo;";
		$config['prev_tag_open']   = "<li>";
		$config['prev_tag_close']  = "</li>\n";
		$config['num_tag_open']   = "<li>";
		$config['num_tag_close']  = "</li>\n";
		$config['cur_tag_open']    = "<li class='active'><a>";
		$config['cur_tag_close']   = "</a></li>\n";
		$this->pagination->initialize($config);
		
		
		$view_data['links']   = $this->pagination->create_links();

		$this->template->set_template('template_2');
		$this->template->write_view('uppermenu','component/uppermenu');
		$this->template->write_view('content','dokter/content_direktori',$view_data);
		$this->template->add_css('assets/css/default.css');
		$this->template->render();
		
	}


}

/* End of file site.php */
/* Location: ./application/controllers/site.php */