<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_auth{

	private $CI;


	function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->library('session');
		$this->CI->load->database();
		$this->CI->load->model('pasien_model');
		$this->CI->load->model('dokter_model');
	}

	function login($username,$password,$type){
		if($type==="dokter"){
			if($sess['id_user'] = $this->CI->dokter_model->login($username,$password)){
				$sess = array_merge($sess,array("type"=>"dokter","logged_in"=>true));
				$this->CI->session->set_userdata($sess);
			}
			return $sess;
		}else{
			if($sess['id_user'] = $this->CI->pasien_model->login($username,$password)){
				$sess = array_merge($sess,array("type"=>"pasien","logged_in"=>true));
				$this->CI->session->set_userdata($sess);
				$data['last_login'] = $this->CI->session->userdata('last_activity');
				$this->CI->pasien_model->update($sesss['id_user'],$data);
			}
			return $sess;			
		}
	}

	function logout(){
		$sess = array('id_user'=>'','type'=>'','logged_in'=>'');
		$this->CI->session->unset_userdata($sess);
		$this->CI->session->sess_destroy();
	}

	function is_pasien_logged_in(){
		if($this->CI->session->userdata('logged_in')){
			$ret['id_pasien'] = $this->CI->session->userdata('id_pasien');
			$ret['social_id'] = $this->CI->session->userdata('social_id');
			$ret['social']    = $this->CI->session->userdata('social');
			return $ret;
		}else{
			return false;
		}
	}

	function get_user_type(){
		return $this->CI->session->userdata('type');
	}


	function authenticate_pasien($redirect){
		$ci =& get_instance();
		if($login = $this->is_pasien_logged_in()){
			echo "belum login";
		}else{
			echo "udah login";
		}
	}
}