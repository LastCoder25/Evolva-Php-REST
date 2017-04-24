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
$route['user/checkAdmin/(:num)']['GET'] = 'userCtrl/checkAdmin/$1';
$route['user/getInfos/(:num)']['GET'] = 'userCtrl/getInfos/$1';

/* EXCHANGE routes */
$route['exchanges']['GET'] = 'exchangeCtrl/getAllExchanges';
$route['exchanges/volunteer/(:num)']['GET'] = 'exchangeCtrl/getExchangesOfVolunteer/$1';
$route['exchanges/notyetvolunteer/(:num)']['GET'] = 'exchangeCtrl/getExchangesOfNonVolunteer/$1';
$route['exchanges/volunteer/ended/(:num)']['GET'] = 'exchangeCtrl/getEndedExchangesOfVolunteer/$1';
$route['exchanges/notyetvolunteer/ended/(:num)']['GET'] = 'exchangeCtrl/getEndedExchangesOfNonVolunteer/$1';
$route['exchanges/create']['POST'] = 'exchangeCtrl/create';
$route['exchanges/update']['POST'] = 'exchangeCtrl/update';

/* DEPOSITE & ARTICLES routes */
$route['deposite/allClothesOfUserOnExchange/(:num)/(:num)']['GET'] = 'depositeCtrl/getClothesOfUserOnExchange/$1/$2';
$route['deposite/allToysOfUserOnExchange/(:num)/(:num)']['GET'] = 'depositeCtrl/getToysOfUserOnExchange/$1/$2';
$route['deposite/allClothesOnExchange/(:num)']['GET'] = 'depositeCtrl/getClothesOnExchange/$1';
$route['deposite/allToysOnExchange/(:num)']['GET'] = 'depositeCtrl/getToysOnExchange/$1';
$route['deposite/amountByUser/(:num)']['GET'] = 'depositeCtrl/amountByUser/$1';
$route['deposite/update']['POST'] = 'depositeCtrl/modifyArticle';
$route['deposite/createClothes']['POST'] = 'depositeCtrl/createClothes';
$route['deposite/createToy']['POST'] = 'depositeCtrl/createToy';
$route['deposite/deleteClothes']['POST'] = 'depositeCtrl/deleteClothes';
$route['deposite/deleteToy']['POST'] = 'depositeCtrl/deleteToy';

/* FROMSTATUS routes */
$route['fromStatus/(:num)']['GET'] = 'fromStatusCtrl/getVolunteersOfExchange/$1';
$route['fromStatus']['POST'] = 'fromStatusCtrl/addVolunteer';
$route['fromStatus/removeVolunteer']['POST'] = 'fromStatusCtrl/removeVolunteer';

/* TYPEOFCLOTHES */
$route['typeOfClothes']['GET'] = 'typeOfClothesCtrl/getTypeOfClothes';
$route['typeOfToys']['GET'] = 'typeOfClothesCtrl/getTypeOfToys';

/* TOKEN */
$route['token']['POST'] = 'tokenCtrl/getIdUserFromToken';
$route['token/deleteSession']['POST'] = 'tokenCtrl/deleteSession';

