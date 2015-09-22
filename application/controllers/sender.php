<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sender extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	function send(){
		$this->load->library('twilio');
		$this->config->load('twilio');
		$from = $this->config->item('number');
		$date = date('Y-m-d H:i:s');
		// $date = new DateTime();
		// Must be revalidate when is it utc / gmt
		// print_r(date('Y-m-d H:i:s'));


		$this->db->trans_start();

		$this->db->select('id_sms,phone_number,message')
				->from('twilio_queue')
				->where('status =','unsent')
				->where('sending_time <=',$date);
		$query = $this->db->get();
		foreach ($query->result_array() as $row) {
			$id_sms  = $row['id_sms'];
			$to      = $row['phone_number'];
			$message = $row['message'];

			$response = $this->twilio->sms($from,$to,$message);

			if($response->IsError){
				// muncul error
			}else{
				// muncul tak error, push ke dalam databse bahwa sms sudah dikirim
				$update['status'] = 'sent';
				$update['deliver_time'] = date('Y-m-d H:i:s');
				$this->db->where('id_sms',$id_sms)
						->update('twilio_queue',$update);
			}
		}

		$this->db->trans_complete();

		// print_r($tmp);

		// if($redirect=$this->session->userdata('redirect')){
		// 	redirect($redirect);
		// }
	}

	function index()
	{
		$this->load->library('twilio');

		$from = '+16207084142';
		$to = '+628155070251';
		$message = 'This is a test...';

		$response = $this->twilio->sms($from, $to, $message);


		if($response->IsError)
			echo 'Error: ' . $response->ErrorMessage;
		else
			echo 'Sent message to ' . $to;
	}

}
	
/* End of file Sender.php */