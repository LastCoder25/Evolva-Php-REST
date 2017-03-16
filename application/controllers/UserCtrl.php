<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCtrl extends CI_Controller
{
	/**
	Constructor that loads models and libraries
	*/
	public function __construct()
	{
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
    Request to get ALL getCompanies
    Send a jsonArray of companies as a response
    */
    public function getUsers()
    {
        $arrayOUsers = $this->userModel->getAllUsers(); // request to model
        //return a json
		echo  count($arrayOUsers) > 1 ?  $this->jsonbourne->forge(0, "Users exist", $arrayOUsers):  $this->jsonbourne->forge(1, "no user", null);
    }

}
