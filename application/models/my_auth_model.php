<?php

class My_auth_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_unverified($email){
		$this->db->select()
				->from('unverified')
				->where('email',$email)
				->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $this->row_array();
		}else{
			return false; // not yet registered or already registered
		}
	}
}