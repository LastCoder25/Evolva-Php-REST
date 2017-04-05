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
$route['exchanges/volunteer/(:num)']['GET'] = 'exchangeCtrl/getExchangesOfVolunteer/$1';
$route['exchanges/notyetvolunteer/(:num)']['GET'] = 'exchangeCtrl/getExchangesOfNonVolunteer/$1';
$route['exchanges/volunteer/ended/(:num)']['GET'] = 'exchangeCtrl/getEndedExchangesOfVolunteer/$1';
$route['exchanges/notyetvolunteer/ended/(:num)']['GET'] = 'exchangeCtrl/getEndedExchangesOfNonVolunteer/$1';

/* EXCHANGE routes */
$route['deposite/allOfUserOnExchange/(:num)/(:num)']['GET'] = 'depositeCtrl/getArticlesOfUserOnExchange/$1/$2';
$route['deposite/update']['POST'] = 'depositeCtrl/modifyArticle';

/* FROMSTATUS routes */
$route['fromStatus/(:num)']['GET'] = 'fromStatusCtrl/getVolunteersOfExchange/$1';
$route['fromStatus']['POST'] = 'fromStatusCtrl/addVolunteer';
$route['fromStatus/removeVolunteer']['POST'] = 'fromStatusCtrl/removeVolunteer';

/* TYPEOFCLOTHES */
$route['typeOfClothes']['GET'] = 'typeOfClothesCtrl/getTypeOfClothes';
