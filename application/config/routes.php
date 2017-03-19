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
$route['users']['GET'] = 'userCtrl/getUsers';
$route['exchanges']['GET'] = 'exchangeCtrl/getExchanges';
$route['status']['GET'] = 'statusCtrl/getStatus';
log_message('info', "routes ici");
