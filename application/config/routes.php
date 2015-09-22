<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "site";
$route['404_override'] = '';

$route['dokter/login']         = 'dokter/login';
$route['dokter/register']      = 'dokter/register';
$route['dokter/do_request']    = 'dokter/do_request';
$route['dokter/checkout']      = 'dokter/checkout';
$route['dokter/do_checkout']   = 'dokter/do_checkout';
$route['dokter/panel2']        = 'dokter/panel2';
$route['dokter/logout']        = 'dokter/logout';
$route['dokter/update']        = 'dokter/update';
$route['dokter/update_jadwal'] = 'dokter/update_jadwal';

$route['klinik/login'] = 'klinik/login';
$route['klinik/dashboard'] = 'klinik/dashboard';
$route['klinik/settings'] = 'klinik/settings';
$route['klinik/edit_album'] = 'klinik/edit_album';
$route['klinik/logout'] = 'klinik/logout';
$route['klinik/manajemen_dokter'] = 'klinik/manajemen_dokter';


$route['dokter/dashboard'] = 'dokter/dashboard';
$route['dokter/view_request'] = 'dokter/view_request';
$route['dokter/do_login'] = 'dokter/do_login';
$route['klinik/([a-z,A-Z,0-9,_]*)'] = 'klinik/index/$1';
$route['dokter/([a-z,A-Z,0-9,_]*)'] = 'dokter/index/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */