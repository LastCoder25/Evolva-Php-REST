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
$route['user/freeToBeVolunteer/(:num)']['GET'] = 'userCtrl/freeToBeVolunteer/$1';
$route['user/create']['POST'] = 'userCtrl/createUser';
$route['user/update']['POST'] = 'userCtrl/modifyUser';
$route['user/check']['POST'] = 'userCtrl/checkIdentifiant';
$route['user/signin']['POST'] = 'userCtrl/signin';

/* EXCHANGE routes */
$route['exchanges']['GET'] = 'exchangeCtrl/getAllExchanges';
$route['exchanges/volunteer/(:num)']['GET'] = 'exchangeCtrl/getExchanges/$1';

/* FROMSTATUS routes */
$route['fromStatus/(:num)']['GET'] = 'fromStatusCtrl/getVolunteersOfExchange/$1';
$route['fromStatus']['POST'] = 'fromStatusCtrl/addVolunteer';
$route['fromStatus/removeVolunteer']['POST'] = 'fromStatusCtrl/removeVolunteer';
