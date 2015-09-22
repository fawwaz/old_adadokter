<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class My_model{
    private $CI;

    function __construct() {
        $this->CI=& get_instance();
        $this->CI->load->database();
        // parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        $this->CI->db->select($fields);
        $this->CI->db->from($table);
        $this->CI->db->limit($perpage,$start);
        if($where){
        $this->CI->db->where($where);
        }
        
        $query = $this->CI->db->get();
        
        $result =  !$one  ? $query->result($array) : $query->row_array() ;
        return $result;
    }
    
    function add($table,$data){
        $this->CI->db->insert($table, $data);         
        if ($this->CI->db->affected_rows() == '1')
		{
			return $this->CI->db->insert_id();
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->CI->db->where($fieldID,$ID);
        $this->CI->db->update($table, $data);

        if ($this->CI->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->CI->db->where($fieldID,$ID);
        $this->CI->db->delete($table);
        if ($this->CI->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
	
	function count($table){
		return $this->CI->db->count_all($table);
	}
}

/* End of file my_model.php */ 
/* Location: ./application/libraries/my_model.php */