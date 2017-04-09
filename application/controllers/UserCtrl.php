<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCtrl extends CI_Controller
{
	/**
	Constructor that loads models and libraries
	*/
	public function __construct($config = 'rest')
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
    Request to get ALL
    Send a jsonArray of users as a response
    */
    public function getUsers()
    {
        $arrayOUsers = $this->userModel->getAllUsers(); // request to model
        //return a json
				echo count($arrayOUsers) > 1 ?  $this->jsonbourne->forge(0, "Users", $arrayOUsers):  $this->jsonbourne->forge(1, "no user", null);
    }

		/**
		Request to check if an identifiant is free to use
		Send a jsonArray of user as a response
		*/
		public function checkIdentifiant()
		{
				log_message('info', "UserCtrl - checkIdentifiant");
				$userData = $this->jsonbourne->decodeReqBody();
				$arrayOUsers = $this->userModel->getOneUser($userData['identifiant']);
				//return a json
				echo count($arrayOUsers) >= 1 ?  $this->jsonbourne->forge(0, "User already exists", $arrayOUsers):  $this->jsonbourne->forge(1, "user free to use", null);
		}

		/**
		Request to check if an identifiant is an admin
		Send a jsonArray of user as a response
		*/
		public function checkAdmin($idUser)
		{
				log_message('info', "UserCtrl - checkAdmin");
				$users = $this->userModel->checkAdmin($idUser);
				echo count($users) >= 1 ?  $this->jsonbourne->forge(0, "admin", $users):  $this->jsonbourne->forge(1, "not admin", null);
		}
                
                /**
		Request to check if an identifiant is an admin
		Send a jsonArray of user as a response
		*/
		public function getInfos($idUser)
		{
				log_message('info', "UserCtrl - getInfos");
				$user = $this->userModel->getInfos($idUser);
				echo count($user) >= 1 ?  $this->jsonbourne->forge(0, "user infos", $user):  $this->jsonbourne->forge(1, "no infos", null);
		}

		/**
    Request to get ALL user free to be volunteer on an exchange
    Send a jsonArray of companies as a response
    */
    public function freeToBeVolunteer($idExchange)
    {
				log_message('info', "UserCtrl - freeToBeVolunteer");
				$users = $this->userModel->getUsersFreeToBeVolunteers($idExchange);
				echo  $users >= 1 ?  $this->jsonbourne->forge(0, "users exists", $users):  $this->jsonbourne->forge(1, "no user for this exchange", null);
		}

		/**
		Request to check if the identifiant and password are from a valid account
		Send a jsonArray of user as a response
		*/
		public function signin()
		{
				log_message('info', "UserCtrl - signin");
				$userData = $this->jsonbourne->decodeReqBody();
				$arrayOUsers = $this->userModel->getAccount($userData['identifiant'], $userData['password']);
				//return a json
				echo count($arrayOUsers) >= 1 ?  $this->jsonbourne->forge(0, "User exists", $arrayOUsers):  $this->jsonbourne->forge(1, "user doesn't exit", null);
		}

		/* _________________________ POST _______________________ */
		/**
			Create a new user
			Json has been passed in request body with user data
			Send a json to confirm the creation of the company
		*/
		public function createUser()
		{
					log_message('info', "UserCtrl - createUser");
					$userData = $this->jsonbourne->decodeReqBody();
					$resultFromCreateANewUser = $this->userModel->create($userData);
					echo count($resultFromCreateANewUser) >= 1 ?  $this->jsonbourne->forge(0, "The user has been created", $resultFromCreateANewUser):  $this->jsonbourne->forge(1, "error in the creation of user", null);
		}

		/* _________________________ PUT _______________________ */
		/**
			Modify a user
			Json has been passed in request body with user data
			Send a json to confirm the creation of the company
		*/
		public function modifyUser()
		{
					log_message('info', "UserCtrl - modifyUser");
					$userData = $this->jsonbourne->decodeReqBody();
					$resultFromCreateANewUser = $this->userModel->modify($userData);
					echo count($resultFromCreateANewUser) >= 1 ?  $this->jsonbourne->forge(0, "The user has been updated", $resultFromCreateANewUser):  $this->jsonbourne->forge(1, "error in the update of user", null);
		}


}
