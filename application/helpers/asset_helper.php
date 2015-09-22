<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function asset_url(){
   return base_url().'assets/';
}

function css_url(){
	return asset_url().'css/';
}

function js_url(){
	return asset_url().'js/';
}

function img_url(){
	return asset_url().'img/';
}

function lib_url(){
	return asset_url().'libs/';
}
/*
function upload_url(){
	return asset_url().'uploads/';
}
*/
