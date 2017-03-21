<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'documentation';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
|
| -----------------------------------------------------------------------
| DEFINE YOUR OWNS ROUTES
|------------------------------------------------------------------------
*/
/* USER routes */
$route['user']['GET'] = 'userCtrl/getUsers';
// $route['user/check/(:)']['GET'] = 'userCtrl/getUser';
// $route['company/check/(:num)']['POST'] = 'companyCtrl/checkCompany/$1';
$route['user']['POST'] = 'userCtrl/createUser';

/* EXCHANGE routes */
$route['exchanges']['GET'] = 'exchangeCtrl/getExchanges';

/* STATUS routes */
$route['status']['GET'] = 'statusCtrl/getStatus';
