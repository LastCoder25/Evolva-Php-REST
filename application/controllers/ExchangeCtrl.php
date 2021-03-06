<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExchangeCtrl extends CI_Controller
{
	/**
	Constructor that loads models and libraries
	*/
	public function __construct()
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->library('jsonbourne');        //logical class to deal with json
		$this->load->model('exchangeModel');        // data layer
	}

	/**
	get the root of the controller
	@deprecated
	*/
	public function index()
	{
		echo "index";
	}
	/* _________________________   GET ______________________ */

    /**
    Request to get ALL getCompanies
    Send a jsonArray of companies as a response
    */
    public function getExchanges()
    {
        $arrayOExchanges = $this->exchangeModel->getAllExchanges(); // request to model
        //return a json
				echo count($arrayOExchanges) > 1 ?  $this->jsonbourne->forge(0, "Exchanges exist", $arrayOExchanges):  $this->jsonbourne->forge(1, "no exchange", null);
    }

}
