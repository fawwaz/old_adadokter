<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->helper("url");

	}

	public function a(){
		$this->load->helper('form');
		echo '<a href="'.base_url().'test/logout">Logout</a>';
		echo "<pre>";
		print_r($this->session->all_userdata());
		echo "</pre>";
	}

	public function b(){
		echo "<pre>";
		print_r($this->session->all_userdata());
		echo "</pre>";
		echo '<a href='.base_url('test/logout').'>logout</a>';
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('test/b');
	}


	
	public function index()
	{
		// $this->template->set_template('default');
		$this->template->add_css('/assets/css/bawaan.css','link');
		echo "cROT";
		$this->template->render();
		// $this->load->view('welcome_message');
	}
	public function setti(){
		$this->load->view('dokter/settings');
	}
	public function test()
	{
		$this->load->model('dokter_model');
		$output=$this->dokter_model->paginate(10,$this->uri->segment(3));
		$dokters=$output['result_array'];

		//Setting up for pagination
		$config['base_url'] = base_url()."/home/test";
		$config['total_rows'] = $output['total_rows'];
		$config['per_page'] = 10;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		foreach ($dokters as $dokter) {
			//print_r($dokters);
			echo "Id Dokter :".$dokter['id'];
			echo "Nama Dokter :".$dokter['nama'];
			echo "Email Dokter :".$dokter['email'];
			echo "Password Dokter :".$dokter['password']."<br>";
		}
		echo $this->pagination->create_links();
	}

	public function ah(){
		$this->load->model('pasien_model');
		$hasils = $this->pasien_model->get(10);
		print_r($hasils);
		foreach ($hasils as $hasil) {
			# code...
			//print_r($hasil);
			//echo $key['id']."<br>";
			//echo $key['nama']."<br>";
			//echo $key['email']."<br>";
			//echo "<hr><br>";
			print_r($hasil);
		}

		#contoh make get_one
		// $hasils = $this->pasien_model->get_one(10);
		// print_r($hasils);
		// foreach ($hasils as $hasil) {
		// 	# code...
		// 	echo $hasil;
		// }		
	}

	public function register(){
		$data['nama']     = "nama2";
		$data['email']    = "emai@email.com";
		$data['password'] = 'password';
		$data['no_hp']    = '081234567890';
		$data['join']     = date('Y-m-d H:i:s');
		$this->load->model('pasien_model');
		if($this->pasien_model->delete(51))
			echo "done";
	}

	public function getwhoisworking()
	{
		$this->load->model('klinik_model');
		$hasils=$this->klinik_model->get_dokter_works_on(2);
		foreach ($hasils as $hasil) {
			# code...
			print_r($hasil);
			echo "<br><hr>";
		}
	}

	public function insertjadwal()
	{
		$this->load->model('dokter_model');
		$hasils=$this->dokter_model->get_one(2);
		print_r(explode(';',$hasils['day1']));
		print_r(explode(';',$hasils['day2']));
		print_r(explode(';',$hasils['day3']));
		print_r(explode(';',$hasils['day4']));
		print_r(explode(';',$hasils['day5']));

	}

	public function teshelper(){
		$this->load->helper('my_time_helper');
		$start =isset($_GET['start']) ? $_GET['start'] : FALSE;
		$end   =isset($_GET['end']) ? $_GET['end'] : FALSE;
		$t     =$this->input->get('start');
		$this->load->helper('file');
		$data = "start : ".date('Y-m-d H:i:s',$start)."end : ".date('Y-m-d H:i:s',$end)."TEST".$t."\n";
		write_file('outputtest.txt',$data,'a+');
		$hasil = divide_time("2013-12-31 07:00","2013-12-31 12:00",30);
		$hasil2 = divide_time("2013-12-31 13:15","2013-12-31 17:00",35);


		header('Access-Control-Allow-Origin: *');
		header("Content-Type: application/json");
		echo json_encode(array_merge($hasil,$hasil2));
	}

	public function demoajax(){
		$this->load->view('test');
	}

	public function coba(){
		$this->load->helper('my_time_helper');
		$this->load->model('dokter_model');
		$start_time = $this->input->get('start',TRUE); // verify first since it could be hacked by malicious script input
		$end_time   = $this->input->get('end',TRUE); // should be an unix time stamp
		if($start_time&&$end_time){
			$start = date('Y-m-d H:i:s',$start_time);
			$end   = date('Y-m-d H:i:s',$end_time);
			
			$dbase=$this->dokter_model->get_exception(1);// supply with doctor id
			print_r($dbase[0]);
			$request_range=date_range($start,$end);
			$exception_range=date_range($dbase[0]['start_date'],$dbase[0]['end_date']); // you should load it first
			
			$result=array_diff($request_range, $exception_range);
			
			$input=array();
			foreach ($result as $key => $value) {
				$tanggal = $value;
				unset($jam);
				$jam[]   = explode(";", $dbase[0]["day".date('N',strtotime($value))]);
				foreach ($jam as $key => $value) {
					foreach ($value as $k => $v) {
						$input[] = $tanggal."#".$v;
			 		}
				}
				//$result[$key]=$value." ".$dbase[0]["day".date('N',strtotime($value))];

				//$input[$tanggal]=str_replace($tanggal,"", $result[$key]);
			}
			print_r($input);
			 //print_r($input);
			extract_day($input);
			
			
		}
		echo "timestamp : ". mktime(18,0,0,12,31,13);
		echo "timestamp : ". mktime(18,0,0,1,8,14);
		// 1. ambil parameter start timestamp dan end timestamp	olah jadi format date. Y-m-d	
		// 2. ambil dari database data batas tanggal eksepsi
		// 3. hitung tanggal-tanggal yang berada di range tanggal eksepsi
		// 4. hitung tanggal-tanggal yang berada di range input start-end.
		// 5. Gunakan fungsi array yang meng-exclude value array di array lain (trim array) antara array input-dan array eksepsi
		// 6. Untuk setiap tanggal yang ada di dalam array yang bersih ambil dari database dokter
		//    Misal pada tanggal 2014-1-1, yang bertepatan dengan hari senin. maka ambil data waktu kerja dari database hari senin.
		//    concat datanya ke dalam array.
		// 7. JIka di hari senin dalam contoh tadi ada beberapa waktu yang dipisahkan oleh istirahat, lakukan merging per tanggal
		// 8. Generate dengan json encode

		// TODO Return the json object excluding exception day.

		//$data['senin']='07:00-12:00;13:00-16:00;';
		//$data['selasa']='07:00-12:00;13:00-16:00;';
		//extract_day($data);
	}

	function p(){
		$this->load->view('page');
	}

	function tele(){
		$this->load->helper('my_time_helper');
		$this->load->model('dokter_model');
		$start_time = intval($this->input->get('start',TRUE)); // verify first since it could be hacked by malicious script input
		$end_time   = intval($this->input->get('end',TRUE)); // should be an unix time stamp
		$id_dokter  = intval($this->input->get('id_dokter',TRUE)); 
				

		if($start_time&&$end_time&&$id_dokter){
			$start = date('Y-m-d H:i:s', $start_time);
			$end   = date('Y-m-d H:i:s', $end_time);

			// jika dokter punya exception
			if($dbase=$this->dokter_model->get_exception($id_dokter)){
				$dbase=$this->dokter_model->get_exception($id_dokter);// supply with doctor id
				
				$request_range   = date_range($start,$end);
				$exception_range = date_range($dbase['start_date'],$dbase['end_date']); // you should load it first
				
				$result          = array_diff($request_range, $exception_range);
			}else{
				$dbase  = $this->dokter_model->get_one($id_dokter);
				$result = date_range($start,$end);
			}
			

			$input=array();
			foreach ($result as $key => $value) {
				$tanggal = $value;
				unset($jam);
				$jam[]   = explode(";", $dbase["day".date('N',strtotime($value))]);
				foreach ($jam as $key => $value) {
					foreach ($value as $k => $v) {
						$input[] = $tanggal."#".$v;
			 		}
				}
				//$result[$key]=$value." ".$dbase[0]["day".date('N',strtotime($value))];

				//$input[$tanggal]=str_replace($tanggal,"", $result[$key]);
			}
			//$out_['events']=$input;
			header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($input);
			
		}

		
	}

	function coba2(){
		//echo sha1(77023); die();
		$this->load->library('my_auth');
		$hasil = $this->my_auth->login("non@odio.ca","77023","dokter");
		if($hasil){
			print_r($hasil);
		}else{
			echo "gagal";
		}
	}

	function coba3(){
		$this->load->library('my_auth');
		$this->my_auth->logout();
	}

	function is_logged(){
		$this->load->library('my_auth');
		echo $this->my_auth->is_logged_in();
	}

	function get_group(){
		$this->load->library('my_auth');
		print_r($this->my_auth->get_user_type());
	}


	// function logout(){
	// 	$this->load->library('my_auth');
	// 	print_r($this->my_auth->logout());
	// }


	public function vi(){
		$this->load->view('profil');

	}

	public function zzz(){
		$this->load->library('recaptcha');
		$view_data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();

		$this->load->view('user/confirm_request',$view_data);
	}

	function upload()
	{
		$data['error'] = 'ga error kok';
		$this->load->helper('form');
		$this->load->view('upload_form',$data);
	}

	function do_upload()
	{
		$config['upload_path'] = realpath(APPPATH.'../assets/photos');
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->load->helper('form');
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			echo "<pre>";
			print_r($data);
			echo "</pre>";
			echo "success";
			die();
			//$this->load->view('upload_success', $data);
		}
	}


	function get_request_list_of_doctor(){
		$this->load->helper('my_time_helper');
		$this->load->model('dokter_model');
		$start_time = intval($this->input->get('start',TRUE)); // verify first since it could be hacked by malicious script input
		$end_time   = intval($this->input->get('end',TRUE)); // should be an unix time stamp
		$id_dokter  = intval($this->input->get('id_dokter',TRUE)); 
		$interval   = intval($this->input->get('interval',TRUE));

		if($start_time&&$end_time&&$id_dokter&&$interval){
			$start = date('Y-m-d', $start_time);
			$end   = date('Y-m-d', $end_time);
			
			// jika dokter punya exception

			$jadwal = $this->dokter_model->get_request_on_range($id_dokter,$start,$end);
			

			$input = array();
			// for ($i=0; $i < count($jadwal); $i++) { 
			foreach ($jadwal as $j) {
				$start = date('Y-m-d H:i',strtotime($j['tanggal_jam']));
				$end   = date('Y-m-d H:i',strtotime($start.'+'.$interval.' minutes'));

				$tmp['title']  = 'Reserved';
				$tmp['start']  = $start;
				$tmp['end']    = $end;
				$tmp['allDay'] = false;
				
				$input[] =$tmp;
			}
			$o = array();
			foreach ($jadwal as $j) {
				$o[] = $j['tanggal_jam'];
			}
			header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($o);			
		}

	}

	function aaa($start,$end){
		$this->load->database();
		// $this->db->select()
		// 		->from('request')
		// 		->where('status','confirmed')
		// 		->where('tanggal_jam >',date('Y-m-d H:i:s',1389502800))
		// 		->where('tanggal_jam <',date('Y-m-d H:i:s',1390021200))
		// 		->where('id_dokter',2);


		// $query = $this->db->get();
		// $res = $query->result_array();
		// foreach ($res as $key) {
		// 	echo $key['tanggal_jam'];
		// 	echo "<br>";
		// }
		// print_r($res);
	}

	function jadwal(){
		$this->load->view('dokter/jadwal');
	}

	function confirm_request(){
		$this->load->model('dokter_model');
		$this->load->library('twilio');
		$this->config->load('twilio');
		$request_ids = $this->input->get('request_ids');
		$id_dokter   = $this->input->get('id_dokter');
		$action      = $this->input->get('action');

		if($action=='terima'){
			//populate data
			$data = array();
			foreach ($request_ids as $key => $value) {
				$tmp['id_request'] = $value;
				$tmp['status'] = 'confirmed';
				$data[] = $tmp;
			}

			$no_hps = $this->dokter_model->confirm_request_batch($data);

			foreach ($no_hps as $n) {
				$from    = $this->config->item('number');
				$to      = $n['no_hp'];
				$message = '[Ada Dokter]Selamat, perjanjian anda bertemu dengan dokter baru saja dikonfirmasi oleh dokter yang bersangkutan';
				$this->twilio->sms($from,$to,$message);
				// handling if twilio fails... too roll back the database
			}
			//json header dont forget
			echo "success";
			// kirim sms juga kalau id anda telah di konfirm
			// push juga ke dalam queue sms bahwa anda telah di konfirm dikirm j-2
		}else if($action=='tolak'){

		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */