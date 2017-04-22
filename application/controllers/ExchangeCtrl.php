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
		Request to get ALL users
		Send a jsonArray of users as a response
		*/
		public function getAllExchanges()
		{
				log_message('info', "ExchangeCtrl - getAllExchanges");
				$arrayOExchanges = $this->exchangeModel->getAllExchanges(); // request to model
				//return a json
				echo count($arrayOExchanges) > 1 ?  $this->jsonbourne->forge(0, "Exchanges", $arrayOExchanges):  $this->jsonbourne->forge(1, "no exchange", null);
		}

    /**
    Request to get ALL getCompanies
    Send a jsonArray of companies as a response
    */
    public function getExchangesOfVolunteer($idUser)
    {
				log_message('info', "ExchangeCtrl - getExchanges");
				$exchanges = $this->exchangeModel->getExchangesOfAVolunteer($idUser);
				echo  $exchanges >= 1 ?  $this->jsonbourne->forge(0, "exchanges exists", $exchanges):  $this->jsonbourne->forge(1, "no exchanges for this volunteer", null);
		}

		/**
		Request to get ALL getCompanies
		Send a jsonArray of companies as a response
		*/
		public function getExchangesOfNonVolunteer($idUser)
		{
				log_message('info', "ExchangeCtrl - getExchanges");
				$exchanges = $this->exchangeModel->getExchangesOfANonVolunteer($idUser);
				echo  $exchanges >= 1 ?  $this->jsonbourne->forge(0, "exchanges exists", $exchanges):  $this->jsonbourne->forge(1, "no exchanges for this volunteer", null);
		}

		/**
		Request to get ALL getCompanies
		Send a jsonArray of companies as a response
		*/
		public function getEndedExchangesOfVolunteer($idUser)
		{
				log_message('info', "ExchangeCtrl - getEndedExchangesOfVolunteer");
				$exchanges = $this->exchangeModel->getEndedExchangesOfAVolunteer($idUser);
				echo  $exchanges >= 1 ?  $this->jsonbourne->forge(0, "exchanges exists", $exchanges):  $this->jsonbourne->forge(1, "no exchanges for this volunteer", null);
		}

		/**
		Request to get ALL getCompanies
		Send a jsonArray of companies as a response
		*/
		public function getEndedExchangesOfNonVolunteer($idUser)
		{
				log_message('info', "ExchangeCtrl - getEndedExchangesOfNonVolunteer");
				$exchanges = $this->exchangeModel->getEndedExchangesOfANonVolunteer($idUser);
				echo  $exchanges >= 1 ?  $this->jsonbourne->forge(0, "exchanges exists", $exchanges):  $this->jsonbourne->forge(1, "no exchanges for this volunteer", null);
		}
                
                /* _________________________ POST _______________________ */
		/**
			Create a new exchange
			Json has been passed in request body with user data
			Send a json to confirm the creation of the exchange
		*/
		public function create()
		{
                    log_message('info', "ExchangeCtrl - create");
                    $exchangeData = $this->jsonbourne->decodeReqBody();
                    $result = $this->exchangeModel->create($exchangeData);
                    echo count($result) >= 1 ?  $this->jsonbourne->forge(0, "The exchange has been created", $result):  $this->jsonbourne->forge(1, "error in the creation of exchange", null);
		}
                
                /* _________________________ POST _______________________ */
		/**
			Create a new exchange
			Json has been passed in request body with user data
			Send a json to confirm the creation of the exchange
		*/
		public function update()
		{
                    log_message('info', "ExchangeCtrl - update");
                    $exchangeData = $this->jsonbourne->decodeReqBody();
                    $result = $this->exchangeModel->update($exchangeData);
                    echo count($result) >= 1 ?  $this->jsonbourne->forge(0, "The exchange has been updated", $result):  $this->jsonbourne->forge(1, "error in the upate of exchange", null);
		}

}
