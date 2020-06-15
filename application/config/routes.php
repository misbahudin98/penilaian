<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['awal'] = 'Admin';
$route['skor'] = 'Admin/score';
$route['tambah_skor'] = 'Admin/add_score';
$route['akhir'] = 'Admin/end';
$route['ubah_skor'] = 'Admin/update_score';
$route['hapus_skor/(:num)'] = 'Admin/delete_score/$1';

$route['tambah_matakuliah'] = 'Admin/add_matakuliah';
$route['ubah_matakuliah'] = 'Admin/update_matakuliah';
$route['hapus_matakuliah/(:num)'] = 'Admin/delete_matakuliah/$1';


$route['user'] = 'Admin/user';
$route['tambah_user'] = 'Admin/add_user';
$route['ubah_user'] = 'Admin/update_user';
$route['hapus_user/(:num)'] = 'Admin/delete_user/$1';


$route['ubah_bobot/(:any)'] = 'Admin/update_value/$1';
$route['kriteria/(:any)'] = 'Admin/criteria/$1';
$route['perhitungan/(:any)'] = 'Admin/count/$1';
$route['sesi/(:any)'] = 'Admin/session/$1';



$route['que/(:any)'] = 'Admin/que/$1';
$route['tambah_que'] = 'Admin/add_que';
$route['ubah_que'] = 'Admin/update_que';
$route['hapus_que/(:num)'] = 'Admin/delete_que/$1';

$route['penilai'] = 'Assessor';
$route['pilih'] = 'Assessor/que';
$route['nilai/(:num)'] = 'Assessor/input/$1';
$route['simpan_nilai'] = 'Assessor/input_action';
$route['ganti_password'] = 'Assessor/password';
$route['profil'] = 'Assessor/profile';

$route['login'] = 'Welcome/login';
$route['logout'] = 'Welcome/logout';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
