<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCtrl extends CI_Controller
{
	log_message('info', "UserModel ici");
	/**
	Constructor that loads models and libraries
	*/
	public function __construct()
	{
		log_message('info', "UserModel ici");
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
		log_message('info', "UserModel ici");
		echo "index";
	}
	/* _________________________   GET ______________________ */

    /**
    Request to get ALL getCompanies
    Send a jsonArray of companies as a response
    */
    public function getUsers()
    {
				log_message('info', "UserCtrl ici");
        $arrayOUsers = $this->userModel->getAllUsers(); // request to model
        //return a json
		echo  count($arrayOUsers) > 1 ?  $this->jsonbourne->forge(0, "Users exist", $arrayOUsers):  $this->jsonbourne->forge(1, "no user", null);
    }

}
