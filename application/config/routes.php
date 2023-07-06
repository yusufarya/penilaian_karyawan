<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Login Admin //
$route['logoutAdmin'] = 'Login/logout';
$route['register'] = 'Login/register';

$route['dashboard'] = 'Dashboard';

// Master Data DIVISI //
$route['divisiList'] = 'Employee/divisiList';
$route['addDivisi'] = 'Employee/addDivisi';
$route['addDivisi_'] = 'Employee/addDivisi_';
$route['editDivisi/(:any)'] = 'Employee/editDivisi/$1';
$route['updateDivisi'] = 'Employee/updateDivisi';
// Master Data POSITION (jabatan) //
$route['positionList'] = 'Employee/positionList';
$route['addPosition'] = 'Employee/addPosition';
$route['addPosition_'] = 'Employee/addPosition_';
$route['editPosition/(:any)'] = 'Employee/editPosition/$1';
$route['updatePosition'] = 'Employee/updatePosition';
// Master Data EMPLOYEE (Karyawan) //
$route['empployeeList'] = 'Employee/empployeeList';
$route['addEmployee'] = 'Employee/addEmployee';
$route['addEmployee_'] = 'Employee/addEmployee_';
$route['editEmployee/(:any)'] = 'Employee/editEmployee/$1';
$route['updateEmployee'] = 'Employee/updateEmployee';

// Penilaian //
$route['detailPekerjaan'] = 'Penilaian/detailPekerjaan';
$route['addaspek'] = 'Penilaian/addaspek';
$route['addaspek_'] = 'Penilaian/addaspek_';
$route['editaspek/(:any)'] = 'Penilaian/editaspek/$1';
$route['updateaspek'] = 'Penilaian/updateaspek';

$route['penilaian'] = 'Penilaian/penilaian';
$route['updateNilaiKaryawan'] = 'Penilaian/updateNilaiKaryawan';

$route['pekerjaan_report'] = 'Laporan/pekerjaan_report';
$route['penilaian_report'] = 'Laporan/penilaian_report';

// KARYAWAN //
$route['karyawan'] = 'Karyawan/index';
$route['daftar_kerja'] = 'Karyawan/daftar_kerja';
$route['penilaian_saya'] = 'Karyawan/penilaian_saya';
$route['detail_nilai/(:any)'] = 'Karyawan/detail_nilai_saya/$1';

$route['logoutMe'] = 'Login/logoutMe';
