<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pasien_model');
	}

	function jadwal(){
		$this->load->helper('my_time_helper');
		$this->load->model('dokter_model');
		$start_time = intval($this->input->get('start',TRUE)); // verify first since it could be hacked by malicious script input
		$end_time   = intval($this->input->get('end',TRUE)); // should be an unix time stamp
		$id_dokter  = intval($this->input->get('id_dokter',TRUE)); 
		$interval   = intval($this->input->get('interval',TRUE));				

		if($start_time&&$end_time&&$id_dokter&&$interval){
			$start = date('Y-m-d H:i:s', $start_time);
			$end   = date('Y-m-d H:i:s', $end_time);
			$today = date('Y-m-d H:i:s');

			$past_range = date_range($start,$today);

			// EXTRACT THE ALVAILABLE SCHEDULE EXCEPT ON LIBUR
			// jika dokter punya exception
			if($dbase=$this->dokter_model->get_exception($id_dokter)){
				$dbase=$this->dokter_model->get_exception($id_dokter);// supply with doctor id
				
				$request_range   = date_range($start,$end);
				$exception_range = date_range($dbase['start_date'],$dbase['end_date']); // you should load it first
				
				$request_range   = array_diff($request_range, $past_range);
				$result          = array_diff($request_range, $exception_range);
			}else{
				$dbase         = $this->dokter_model->get_one($id_dokter);
				$request_range = date_range($start,$end);
				$result        = array_diff($request_range, $past_range);
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
			

			// RESERVED DATE
			$jadwal = $this->dokter_model->get_request_on_range($id_dokter,$start,$end);
			// $reserved = array();
			// foreach ($jadwal as $j) {
			// 	$start = date('Y-m-d H:i',strtotime($j['tanggal_jam']));
			// 	$end   = date('Y-m-d H:i',strtotime($start.'+'.$interval.' minutes'));

			// 	$tmp['title']  = 'Reserved';
			// 	$tmp['start']  = $start;
			// 	$tmp['end']    = $end;
			// 	$tmp['allDay'] = false;
				
			// 	$reserved[] =$tmp;
			// }

			$o = array();
			foreach ($jadwal as $j) {
				$o[] = $j['tanggal_jam'];
			}

			$output['alvailable'] = $input;
			$output['reserved']   = $o;
			header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($output);
			
		}
	}

	private function get_request_list_of_doctor(){
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
			header('Access-Control-Allow-Origin: *');
			header("Content-Type: application/json");
			echo json_encode($input);			
		}

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

			$no_hps = $this->dokter_model->update_request_status_batch($data);

			// if no hps ada isinya gak lebih dari 0 return true, else berarti transaction nya failed, jadi kasih warning ke dokter
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
			$data = array();
			foreach ($request_ids as $key => $value) {
				$tmp['id_request'] = $value;
				$tmp['status'] = 'confirmed';
				$data[] = $tmp;
			}

			$no_hps = $this->dokter_model->delete_request_batch($data);


			// if no hps ada isinya gak lebih dari 0 return true, else berarti transaction nya failed, jadi kasih warning ke dokter
			foreach ($no_hps as $n) {
				$from    = $this->config->item('number');
				$to      = $n['no_hp'];
				$message = '[Ada Dokter]Maaf, perjanjian anda dengan dokter tidak disetujui oleh dokter,silahkan memilih di waktu lainya';
				$this->twilio->sms($from,$to,$message);
				// handling if twilio fails... too roll back the database
			}

			echo "failed"; // failed messagenya tapi isinya tetep success
		}

	}

}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */