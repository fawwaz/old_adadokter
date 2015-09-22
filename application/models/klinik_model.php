<?php
class Klinik_model extends CI_Model {

    var $table_name ='klinik';

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
	
	function get_all($perpage,$start=0)
	{
		return $this->my_model->get($this->table_name,'','',$perpage,$start,false);		
	}

	function get_one($id)
	{
		return $this->my_model->get($this->table_name,'',array('id_klinik'=>$id),1,0,true);
	}

	function get_by_alias($alias)
	{
		return $this->my_model->get($this->table_name,'',array('alias_klinik'=>$alias),1,0,true);
	}

	function insert($data)
	{
		return $this->my_model->add($this->table_name,$data);
	}

	function update($id,$data)
	{
		return $this->my_model->edit($this->table_name,$data,'id_klinik',$id);
	}

	function delete($id)
	{
		return $this->my_model->delete($this->table_name,'id_klinik',$id);
	}

	function get_dokter_works_on($id_klinik)
	{
		$this->db->select('dokter.*')
				->from('klinik')
				->join('bekerja','klinik.id_klinik=bekerja.id_klinik')
				->join('dokter','dokter.id_dokter=bekerja.id_dokter')
				->where('klinik.id_klinik',$id_klinik);
		$query=$this->db->get();
		return $query->result_array();
	}

	function find_nama_klinik()
	{
		//TODO write sql statement using %like%
	}

	function get_one_by_alias($alias){
		$this0->db->select()
				->from('klinik')
				->where('alias_klinik',$alias);
		$query = $this->db->get();
		return $query->row_array();
	}

	function add_dokter_bekerja($id_klinik,$id_dokter){
		$this->db->insert('bekerja',array("id_klinik"=>$id_klinik,"id_dokter"=>$id_dokter));
	}

	function delete_dokter_bekerja(){
		$this->db->where('id_dokter',$id_dokter)
				->where('id_klinik',$id_klinik)
				->delete('bekerja');
	}

	function login($email,$password){
		$this->db->select('id_klinik')
				->from($this->table_name)
				->where('email_klinik',$email)
				->where('password_klinik',$password)
				->limit(1);
		$query = $this->db->get();
		$out = $query->row_array();
		if($query->num_rows()==1){
			return $out['id_klinik'];
		}else{
			return false;
		}
	}

	function is_alias_exist($alias){
		$this->db->select('alias_klinik')->from($this->table_name)->where('alias_klinik',$alias)->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==1){
			return true;
		}else{
			return false;
		}
	}

	function get_klinik_id_from_alias($alias){
		$this->db->select('id_klinik')->from($this->table_name)->where('alias_klinik',$alias);
		$query = $this->db->get();
		$out = $query->row_array();
		if($query->num_rows()==1){
			return $out['id_klinik'];
		}else{
			return false;
		}
	}

	function get_dokter_id_from_alias($alias){
		$this->db->select('id_dokter')->from('dokter')->where('alias',$alias);
		$query = $this->db->get();
		$out = $query->row_array();
		if($query->num_rows()==1){
			return $out['id_dokter'];
		}else{
			return false;
		}	
	}

	function add_dokter_works_on($id_klinik,$alias){
		$this->db->trans_start();
		if($id_dokter = $this->get_dokter_id_from_alias($alias)){
			// check is the id_dokter already there or not
			$q = $this->db->select('id_dokter')->from('bekerja')->where('id_dokter',$id_dokter)->where('id_klinik',$id_klinik)->get();
			if($q->num_rows()==0){
				$insert['id_klinik'] = $id_klinik;
				$insert['id_dokter'] = $id_dokter;
				$this->db->insert('bekerja',$insert);
			}
		}else{
			return false;
		}
		$this->db->trans_complete();
		
		return $this->db->trans_status();
	}

	function delete_dokter_works_on($id_klinik,$id_dokter){
		$this->db->where('id_dokter',$id_dokter)
				->where('id_klinik',$id_klinik)
				->delete('bekerja');

	}

	function get_request_on_klinik($id_klinik,$perpage,$start=0){
		$this->db->select('request.*,klinik.alamat_klinik,pasien.nama_pasien,pasien.no_hp,dokter.nama_dokter,dokter.id_dokter,dokter.alias,')
                ->from('request')
                ->join('pasien','request.id_pasien=pasien.id_pasien')
                ->join('dokter','request.id_dokter=dokter.id_dokter')
                ->join('klinik','request.id_klinik=klinik.id_klinik')
                ->where('klinik.id_klinik',$id_klinik)
                ->order_by('status','asc')
                ->order_by('tanggal_jam','asc')
                ->limit($perpage,$start);

        $query = $this->db->get();
        return $query->result_array();
	}

	function count_get_request_on_klinik($id_klinik){
		$this->db->select('request.*,klinik.alamat_klinik,pasien.nama_pasien,pasien.no_hp,dokter.nama_dokter,dokter.id_dokter,dokter.alias,')
                ->from('request')
                ->join('pasien','request.id_pasien=pasien.id_pasien')
                ->join('dokter','request.id_dokter=dokter.id_dokter')
                ->join('klinik','request.id_klinik=klinik.id_klinik')
                ->where('klinik.id_klinik',$id_klinik)
                ->order_by('status','asc')
                ->order_by('tanggal_jam','asc');

        $query = $this->db->get();
        return $query->num_rows();
	}
}

/* End of file klinik_model.php */ 
/* Location: ./application/models/klinik_model.php */