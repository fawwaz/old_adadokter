<?php
class Request_model extends CI_Model {

    var $table_name ='request';

    // var $title   = '';
    // var $content = '';
    // var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->library('my_model');
    }
    
    function get_all($perpage,$start)
    {
        return $this->my_model->get($this->table_name,'','',$perpage,$start,false);     
    }

    function get_one($id)
    {
        return $this->my_model->get($this->table_name,'',array('id_request'=>$id),1,0,true);
    }

    function insert($data)
    {
        return $this->my_model->add($this->table_name,$data);
    }

    function update($id,$data)
    {
        return $this->my_model->edit($this->table_name,$data,'id_request',$id);
    }

    function delete($id)
    {
        return $this->my_model->delete($this->table_name,'id_request',$id);
    }

    
}

/* End of file dokter_model.php */ 
/* Location: ./application/models/dokter_model.php */