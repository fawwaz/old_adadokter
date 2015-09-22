<?php
class Dokter_model extends CI_Model {

    var $table_name ='dokter';

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
        return $this->my_model->get($this->table_name,'',array('id_dokter'=>$id),1,0,true);
    }

    function get_by_alias($alias)
    {
        return $this->my_model->get($this->table_name,'',array('alias'=>$alias),1,0,true);
    }

    function insert($data)
    {
        return $this->my_model->add($this->table_name,$data);
    }

    function update($id,$data)
    {
        return $this->my_model->edit($this->table_name,$data,'id_dokter',$id);
    }

    function delete($id)
    {
        return $this->my_model->delete($this->table_name,'id_dokter',$id);
    }

    function find($data,$perpage,$start)
    {
        if(isset($data['name'])){
            $this->find_by_name($data['name'],$perpage,$start);
        }else if(isset($data['klinik'])){
            $this->find_by_klinik($data['klinik'],$perpage,$start);
        }
    }
    
    function get_where_works($id_dokter)
    {
        $this->db->select('klinik.*')
                ->from('klinik')
                ->join('bekerja','klinik.id_klinik=bekerja.id_klinik')
                ->join('dokter','dokter.id_dokter=bekerja.id_dokter')
                ->where('dokter.id_dokter',$id_dokter);
        $query=$this->db->get();
        return $query->row_array();
    }

    function get_request($id_dokter){
        $this->db->select('request.*,dokter.nama_dokter,klinik.nama_klinik,pasien.nama_pasien,pasien.no_hp')
                ->from('request')
                ->join('pasien','request.id_pasien=pasien.id_pasien')
                ->join('dokter','request.id_dokter=dokter.id_dokter')
                ->join('klinik','request.id_klinik=klinik.id_klinik')
                ->where('request.id_dokter',$id_dokter)
                ->where('status','req')
                ->order_by('tanggal_jam','asc');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    function is_alias_exist($alias){
        $this->db->select('alias')
                ->from($this->table_name)
                ->where('alias',$alias);
        $query = $this->db->get();
        if($query->num_rows==0){
            return false;
        }else{
            return true;
        }
    }

    function clear_request(){
//        $this->db->where('tanggal_jam <')
    }

    function approve_request($id_request,$status){
        $update['status'] = $status;
        $this->db->where('id_request',$id_request)
                    ->update('request',$status);
    }



    function get_exception($id_dokter){
        $this->db->select('*')
                    ->from('eksepsi')
                    ->join('dokter','dokter.id_dokter=eksepsi.id_dokter')
                    ->where('dokter.id_dokter',$id_dokter);
        $query=$this->db->get();
        return $query->row_array();
    }

    function login($email,$password){
        $this->db->select('id_dokter,nama_dokter,email_dokter,statement,day1,day2,day3,day4,day5,day6,day7,alias,join_date,active_untill')
                ->from($this->table_name)
                ->where('email_dokter',$email)
                ->where('password_dokter',sha1($password))
                ->where('active_untill >',date('Y-m-d H:i:s'))
                ->limit(1);

        $query = $this->db->get();
        $out   = $query->row_array();
        if($query->num_rows()==1){
            return $out['id_dokter'];
        }else{
            return false;
        }
    }


    function find_by_name($name,$perpage,$start)
    {
        // USING %LIKE% 
        $this->db->select()
            ->from($this->table_name)
            ->join('bekerja','bekerja.id_dokter=dokter.id_dokter')
            ->join('klinik','klinik.id_klinik=bekerja.id_klinik')
            ->like('nama_dokter',$name)
            ->limit($perpage,$start);
        $query = $this->db->get();
        return $query->result_array();   
    }

    function count_find_by_name($name){
        $this->db->select()
            ->from($this->table_name)
            ->like('nama_dokter',$name);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_metode($id_dokter){
        $this->db->select('metode_antrian')
                ->from($this->table_name)
                ->where('id_dokter',$id_dokter);
        $q   = $this->db->get();
        $out = $q->row_array();
        if($q->num_rows==1){
            return $out['metode_antrian'];
        }else{
            return false;
        }
    }

    function get_number_antrian_today($id_dokter){
        return $this->db->select()
                ->from('antrian')
                ->where('id_dokter',$id_dokter)
                ->where('waktu_dipesan',date('Y-m-d'))
                ->count_all_results();


    }

    function get_today_antrian_list($id_dokter){
        $this->db->select()
                ->from('antrian')
                ->join('dokter','antrian.id_dokter=dokter.id_dokter')
                ->join('klinik','antrian.id_klinik=klinik.id_klinik')
                ->join('pasien','antrian.id_pasien=pasien.id_pasien')
                ->where('antrian.status','confirmed')
                ->where('dokter.id_dokter',$id_dokter)
                ->where('antrian.waktu_dipesan',date('Y-m-d'));

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_unconfirmed_antrian($id_dokter){
        $this->db->select()
                ->from('antrian')
                ->join('pasien','antrian.id_pasien=pasien.id_pasien')
                ->where('antrian.id_dokter',$id_dokter)
                ->where('status','unconfirmed');

        $query = $this->db->get();    
        return $query->result_array();
        
    }

    function confirm_antrian($id_antrian){
        $data['status'] = 'confirmed';
        $this->db->where('id_antrian',$id_antrian)
                ->update('antrian',$data);
    }


    function insert_antrian($data){
        $this->my_model->add('antrian',$data);
    }

    function set_served($id_antrian){
        $data['status'] = 'served';
        $this->db->where('id_antrian',$id_antrian)
                ->update('antrian',$data);
    }

    function add_served($id_dokter){
        $this->db->trans_start();
        $q = $this->db->select('served')->from($this->table_name)->where('id_dokter',$id_dokter)->get();
        $s = $q->row_array();

        $update['served'] = $s['served']+1;

        // $this->db->reset();

        $this->db->where('id_dokter',$id_dokter)->update($this->table_name,$update);
        $this->db->trans_complete();

        
        if($this->db->trans_status()===false){
            return false;
        }else{
            return true;
        }
    }


    function insert_request($data){
        $this->db->insert('request',$data);
    }

    function get_info_dokter_lengkap($id_dokter){
        $this->db->select()
                ->from($this->table_name)
                ->join('bekerja','dokter.id_dokter=bekerja.id_dokter')
                ->join('klinik','bekerja.id_klinik=klinik.id_klinik')
                ->where('dokter.id_dokter',$id_dokter)
                ->limit(1);
        $query = $this->db->get();
        
        return $query->row_array();
    }

    
    function get_request_on_range($id_dokter,$start,$end){
        $this->db->select('tanggal_jam')
                ->from('request')
                ->where('status','confirmed')
                ->where('id_dokter',$id_dokter)
                ->where('tanggal_jam >',$start)
                ->where('tanggal_jam <',$end)
                ->order_by('tanggal_jam','asc');
        $query = $this->db->get();
        $out   = $query->result_array();
        return $out;
    }


    function confirm_request($id_request){
        $this->db->where('id_request',$id_request);
        $this->db->update('request',array('status'=>'confirmed'));

        $this->db->select('no_hp')
                ->from('pasien')
                ->join('request','request.id_pasien=pasien.id_pasien')
                ->where('id_dokter',$id_dokter);
        $query = $this->db->get();
        $out = $query->row_array();
        return $out['no_hp'];
    }

    function delete_request(){
        $this->db->where('id_request',$id_request);
        $this->db->delete('request');   
    }


    function get_request_by_id_request($id_request){
        $this->db->select()
                ->from('request')
                ->join('dokter','request.id_dokter=dokter.id_dokter')
                ->join('klinik','request.id_klinik=klinik.id_klinik')
                ->where('id_request',$id_request);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_request_status_batch($data){
        $this->db->trans_start();
        // 1. Inserting the datas
        $this->db->update_batch('request',$data,'id_request');


        // 2. Converting the datas given for finding matching no_hps
        $ids = array();
        foreach ($data as $d) {
            $ids[] = $d['id_request'];
        }


        // 3. Getting the no_hps
        $this->db->select('no_hp,tanggal_jam')
                ->from('request')
                ->join('pasien','pasien.id_pasien=request.id_pasien')
                ->where_in('id_request',$ids);
        $query = $this->db->get();
        $res = $query->result_array();


        // 4. Putting all the message to twilio queue 
        $insert = array();
        foreach ($res as $r) {
            $tmp['phone_number'] = $r['no_hp'];
            $tmp['message']      = '[Ada Dokter] Reminder, anda memiliki janji dengan dokter dalam 2 jam kedepan.';
            $tmp['sending_time'] = date('Y-m-d H:i:s',strtotime($r['tanggal_jam']) - (2*60*60));
            $tmp['status']       = 'unsent';
            $insert[]            = $tmp;
        }
        $this->db->insert_batch('twilio_queue',$insert);

        

        $this->db->trans_complete();
        if($this->db->trans_status()===false){
            return false;
        }else{
            return $res;
        }
    }

    // function clear_request(){   
        // $this->db->where('tanggal_jam <',date(Y-m-d H:i:s)) // cek bisa gak kalau di compare sama format tanggal yan gak usah h i s
        //          ->delete('request');
    // }

    function add_request_by_self($data){
        $this->db->insert('request',$data);
    }

    function delete_request_batch($ids){
        $this->db->trans_start();

        foreach ($ids as $id) {
            $this->db->where('id_request',$id_request)
                    ->delete('request');
        }

        $this->db->select('no_hp,tanggal_jam')
                ->from('request')
                ->join('pasien','pasien.id_pasien=request.id_pasien')
                ->where_in('id_request',$ids);
        $query = $this->db->get();
        $res = $query->result_array();

        $this->db->trans_complete();
        if($this->db->trans_status===false){
            return false;
        }else{
            return $res;
        }
    }


    function get_all_with_klinik($perpage,$start){
        $this->db->select('dokter.nama_dokter,klinik.alamat_klinik,klinik.nama_klinik,dokter.profile_pic,dokter.alias')
                ->from($this->table_name)
                ->join('bekerja','dokter.id_dokter=bekerja.id_dokter')
                ->join('klinik','bekerja.id_klinik=klinik.id_klinik')
                ->order_by('dokter.nama_dokter','asc')
                ->limit($perpage,$start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_get_all_with_klinik(){
        $this->db->select()
                ->from($this->table_name)
                ->join('bekerja','dokter.id_dokter=bekerja.id_dokter')
                ->join('klinik','bekerja.id_klinik=klinik.id_klinik');
        $query = $this->db->get();
        return $query->num_rows();
    }
    
}

/* End of file dokter_model.php */ 
/* Location: ./application/models/dokter_model.php */