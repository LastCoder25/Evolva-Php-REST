<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCtrl extends CI_Controller
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
		$this->load->model('userModel');        // data layer
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
    public function getUsers()
    {
        $arrayOUsers = $this->userModel->getAllUsers(); // request to model
        //return a json
				echo count($arrayOUsers) > 1 ?  $this->jsonbourne->forge(0, "Users exist", $arrayOUsers):  $this->jsonbourne->forge(1, "no user", null);
    }

		/**
		Request to check if an identifiant is free to use
		Send a jsonArray of user as a response
		*/
		public function checkIdentifiant($identifiant)
		{
				log_message('info', "checkIdentifiant");
				//$userData = $this->jsonbourne->decodeReqBody();
				$arrayOUsers = $this->userModel->getOneUser($identifiant);
				//return a json
				echo count($arrayOUsers) > 1 ?  $this->jsonbourne->forge(0, "Users exist", $arrayOUsers):  $this->jsonbourne->forge(1, "no user", null);
		}

		/* _________________________ POST _______________________ */
		/**
			Create a new user
			Json has been passed in request body with user data
			Send a json to confirm the creation of the company
		*/
		public function createUser()
		{
					log_message('info', "userCtrl");
					$userData = $this->jsonbourne->decodeReqBody();
					$resultFromCreateANewUser = $this->userModel->create($userData);
					echo count($resultFromCreateANewUser) > 1 ?  $this->jsonbourne->forge(0, "The user has been created", $resultFromCreateANewUser):  $this->jsonbourne->forge(1, "error in the creation of user", null);
		}


}
