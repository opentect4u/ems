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
$route['default_controller'] = 'auths';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['(:any)'] = '$1s';
$route['(:any)/approve'] = '$1s/approves';
$route['(:any)/payment'] = '$1s/payments';
$route['(:any)/statement'] = '$1s/statements';
$route['(:any)/payslipgeneration'] = '$1s/payslipGenerations';
$route['(:any)/payslip'] = '$1s/payslips';
$route['(:any)/notice'] = '$1s/notices';
$route['(:any)/(:any)'] = '$1s/f_$2';

$route['(:any)/approve/(:any)'] = '$1s/approves/f_$2';
$route['(:any)/payment/(:any)'] = '$1s/payments/f_$2';
$route['(:any)/statement/(:any)'] = '$1s/statements/f_$2';
$route['(:any)/payslipgeneration/(:any)'] = '$1s/payslipGenerations/f_$2';
$route['(:any)/payslip/(:any)'] = '$1s/payslips/f_$2';
$route['(:any)/notice/(:any)'] = '$1s/notices/f_$2';
$route['(:any)/report/(:any)'] = '$1s/reports/f_$2';

$route['(:any)/(:any)/(:any)'] = '$1s/f_$2_$3';
$route['(:any)/approve/(:any)/(:any)'] = '$1s/approves/f_$3_$4';
$route['(:any)/(:any)/(:any)/(:any)'] = '$1s/$2s/f_$3_$4';