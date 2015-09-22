<?php
class Pasien_model extends CI_Model {

    var $table_name ='pasien';

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
		return $this->my_model->get($this->table_name,'',array('id_pasien'=>$id),1,0,true);
	}

	function insert($data)
	{
		return $this->my_model->add($this->table_name,$data);
	}

	function update($id,$data)
	{
		return $this->my_model->edit($this->table_name,$data,'id_pasien',$id);
	}

	function delete($id)
	{
		return $this->my_model->delete($this->table_name,'id_pasien',$id);
	}

	/**
	*	Specific function
	*/
	function login($email,$password){
		$this->db->select('id_pasien,nama_pasien,email_pasien,no_hp,join_date')
				->from($this->table_name)
				->where('email_pasien',$email)
				->where('password_pasien',sha1($password))
				->limit(1);

		$query = $this->db->get();
		$out   = $query->row_array();
		if($query->num_rows()==1){
			return $out['id_pasien'];
		}else{
			return false;
		}
	}

	function is_email_registered($email){
		$this->db->select('no_hp')
				->from($this->table_name)
				->where('email_pasien',$email)
				->limit(1);
		$query = $this->db->get();
		$out   = $query->row_array();
		if($query->num_rows()==1){
			return $out['id_pasien'];
		}else{
			return false;
		}
	}

	function is_social_registered($social_id,$social){
		$this->db->select('email_pasien,no_hp')
				->from($this->table_name)
				->where('social',$social)
				->where('social_id',$social_id)
				->limit(1);
		$query = $this->db->get();
		if($query->num_rows==1){
			return true;
		}else{
			return false;
		}
	}

	function is_verified($id,$social='user'){
		$this->db->select('sms_code')
				->from($this->table_name);
		if($social=='user'){
			$this->db->where('id_pasien',$id)->limit(1);
		}else{
			$this->db->where('social',$social);
			$this->db->where('social_id',$id)->limit(1);
		}

		$query = $this->db->get();
		$out   = $query->row_array();

		if($out['sms_code']=='verified'){
			return true;
		}else{
			return false;
		}

	}

	function get_id_user_from_social_id($social_id){
		$this->db->select()
				->from($this->table_name)
				->where('social_id',$social_id)
				->limit(1);

		$query = $this->db->get();
		$out   = $query->row_array();
		if($query->num_rows==1){
			return $out['id_pasien'];
		}else{
			return false;
		}
	}

	function get_sms_code_from_social_id($social_id,$social='twitter'){
		$this->db->select('sms_code')
				->from($this->table_name)
				->where('social_id',$social_id)
				->where('social',$social)
				->limit(1);
		$query = $this->db->get();
		$out = $query->row_array();
		if($query->num_rows()==1){
			return $out['sms_code'];
		}else{
			return false;
		}
	}

	function get_no_hp_pasien($id_pasien){
		$this->db->select('no_hp')
				->from($this->table_name)
				->where('id_pasien',$id_pasien)
				->limit(1);
		$query = $this->db->get();
		$out   = $query->row_array();

		if($query->num_rows()==1){
			return $out['no_hp'];
		}else{
			return false;
		}
	}

	function get_request($id_pasien){
		$this->db->select('request.*,dokter.nama_dokter,status,alias,served,profile_pic,klinik.alamat_klinik')
				->from($this->table_name)
				->join('request','pasien.id_pasien=request.id_pasien')
				->join('dokter','request.id_dokter=dokter.id_dokter')
				->join('klinik','request.id_klinik=klinik.id_klinik')
				->where('pasien.id_pasien',$id_pasien)
				->where('tanggal_jam >',date('Y-m-d H:i:s',strtotime('-1 day')))
				->order_by('request.status','asc')
				->order_by('tanggal_jam','asc');

		$query = $this->db->get();
		$out   = $query->result_array();

		return $out;	
	}

	function cancel_request($id_request){
		$this->db->delete('request',array('id_request'=>$id_request));
	}

	function add_to_favorite($id_pasien,$id_dokter){
		// $this->db->insert('favorite',array('id_pasien' =>$id_pasien,"id_dokter"=>$id_dokter );
	}

	function delete_favorite($id_pasien,$id_dokter){
		$this->db->where('id_dokter',$id_dokter)
				->where('id_pasien',$id_pasien)
				->delete('favorite');
	}

}

/* End of file pasien_model.php */ 
/* Location: ./application/models/pasien_model.php */