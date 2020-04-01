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
// AUTH
	$route['log'] 			= 'auth/LoginController';
	$route['log/do/login'] 	= 'auth/LoginController/do_login';
	$route['log/out'] 		= 'auth/LogoutController/log_out';
// END AUTH

// PAGE
	$route['home'] 			= 'page/HomeController';

	// ASET
		$route['aset'] 			= 'page/AsetController';
		$route['aset/list']		= 'page/AsetController/get_aset_list';
		$route['aset/do/add'] 	= 'page/AsetController/aset_do_add';
	// END

	// CONFIG
		$route['config'] 			= 'page/ConfigController';

		// Perushaan
			// $route['perusahaan'] 			= 'page/PerusahaanController';
			$route['perusahaan/list'] 		= 'page/PerusahaanController/get_perusahaan_list';
			$route['perusahaan/do/add'] 	= 'page/PerusahaanController/perusahaan_do_add';
			$route['perusahaan/do/edit'] 	= 'page/PerusahaanController/perusahaan_do_edit';

		// TOP
			// $route['top'] 			= 'page/TermofpaymentController';
			$route['top/list'] 		= 'page/TermofpaymentController/get_top_list';
			$route['top/do/add'] 	= 'page/TermofpaymentController/top_do_add';
			$route['top/do/edit'] 	= 'page/TermofpaymentController/top_do_edit';

		// Tanggal Acuan
			// $route['tanggal-acuan'] 			= 'page/TanggalacuanController';
			$route['tanggal-acuan/list'] 		= 'page/TanggalacuanController/get_tanggal_acuan_list';
			$route['tanggal-acuan/do/add'] 		= 'page/TanggalacuanController/tanggal_acuan_do_add';
			$route['tanggal-acuan/do/edit'] 	= 'page/TanggalacuanController/tanggal_acuan_do_edit';
	// END

	// EXPORT XLSX
		$route['export'] 				= 'export/ExportController';
		$route['export/summary'] 		= 'export/ExportController/summary';
		$route['export/kkp'] 		= 'export/ExportController/kkp';
	// END

// END PAGE


	
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
