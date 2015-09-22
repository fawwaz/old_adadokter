<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function divide_time($start_time,$end_time,$interval){
	unset($output);
	$output = array();
	$time   = $start_time;
	while (strtotime($time)<strtotime($end_time)) {
		$time_starts = $time;//date("Y-m-d H:i",strtotime($time));
		$time_ends   = date("Y-m-d H:i",strtotime($time_starts)+60*$interval);

		//last check kalau time ends lebih dari ends time
		if(date("H:i",strtotime($time_ends)) > date("H:i",strtotime($end_time))){
			$time_ends = date("H:i",strtotime($end_time));
		}
		$temp['title']  = 'kunjungan';
		$temp['start']  = $time_starts;
		$temp['end']    = $time_ends;
		$temp['allDay'] = false;
		array_push($output, $temp);
		$time=$time_ends;
	}
	return $output;
}



function date_range($first, $last, $step = '+1 day', $format = 'Y-m-d' ) { 

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) { 

        $dates[] = date($format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}


/*function extract_day($data){
	// echo "<ul>";
	$out=array();
	foreach ($data as $key => $value) {
		$temp=explode(';', $value);
		//array_pop($temp);
		// echo "<li>";
		$out[$key]=array();
		foreach ($temp as $k => $v) {
			$t=explode('-', $v);
			$o=divide_time($key.' '.$t[0],$key.' '.$t[1],60);
			//print_r(json_encode($o));
			echo 'input 1 : '.$key.' '.$t[0]."\t input 2: ".$key.' '.$t[1]."<br>";
			//$out[$key]=array_merge((array)$out[$key],$o);
			// echo "<br>";
		}


		// echo "</li>";
		//echo $key . ":". $value ."<br>";
	}
	
	// echo "</ul>";
	print_r(json_encode($out));
}*/

function extract_day($data){
	$out=array();
	$n=0;
	foreach ($data as $k=>$v) {
		$temp      = explode("#", $v);
		$temp2     = explode("-", $temp[1]);
		$tgl       = $temp[0];
		$from      = $temp2[0];
		$to        = $temp2[1];
		//$o         = divide_time($tgl." ".$from,$tgl." ".$to,60);
		//$out[$tgl] = array_merge((array)$out[$tgl],$o);
		echo "from ".$tgl." ".$from."\t to :".$tgl." ".$to."\n";
		//$out[$tgl]= $o;
		$n++;
	}
	print_r($n);
	print_r(divide_time("2013-12-31 07:30","2013-12-31 12:00",45));
	print_r(divide_time("2013-12-31 07:30","2013-12-31 12:00",60));
	print_r(divide_time("2013-12-31 13:00","2013-12-31 17:00",60));
	print_r(divide_time("2013-12-31 18:30","2013-12-31 20:00",60));
	print_r(divide_time("2014-01-01 07:30","2014-01-01 12:00",60));
	//print_r(divide_time("2014-01-01 13:00","2014-01-01 17:00",60));
	//print_r(divide_time("2014-01-01 18:30","2014-01-01 20:00",60));
	//print_r(divide_time("2014-01-06 07:30","2014-01-06 12:00",60));
	//print_r(divide_time("2014-01-06 13:00","2014-01-06 17:00",60));
	//print_r(divide_time("2014-01-06 18:30","2014-01-06 20:00",60));
	//print_r(divide_time("2014-01-07 07:30","2014-01-07 12:00",60));
	//print_r(divide_time("2014-01-07 13:00","2014-01-07 17:00",60));
	//print_r(divide_time("2014-01-07 18:30","2014-01-07 20:00",60));
	//print_r(divide_time("2014-01-08 07:30","2014-01-08 12:00",60));
	//print_r(divide_time("2014-01-08 13:00","2014-01-08 17:00",60));
	//print_r(divide_time("2014-01-08 18:30","2014-01-08 20:00",60));
}