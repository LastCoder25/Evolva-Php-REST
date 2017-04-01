<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fromStatusCtrl extends CI_Controller
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
		$this->load->model('fromStatusModel');        // data layer
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
    public function getVolunteersOfExchange($idExchange)
    {
      log_message('info', "fromStatusctrl - getVolunteersOfExchange");
      $volunteers = $this->fromStatusModel->getVolunteersOfExchange($idExchange);
      echo  $volunteers >= 1 ?  $this->jsonbourne->forge(0, "volunteers exists for this exchange", $volunteers):  $this->jsonbourne->forge(1, "no volunteers for this exchange", null);
    }

    /* _________________________ POST _______________________ */
    /**
      Add a new volunteer
      Json has been passed in request body with user data
      Send a json to confirm the creation of the company
    */
    public function addVolunteer()
    {
          log_message('info', "fromStatusctrl - addVolunteer");
          $data = $this->jsonbourne->decodeReqBody();
          $result = $this->fromStatusModel->add($data);
          echo count($result) >= 1 ?  $this->jsonbourne->forge(0, "The volunteer has been added", $result):  $this->jsonbourne->forge(1, "error in the add of volunteer", null);
    }

    /* _________________________ DELETE _______________________ */
    /**
      Remove a volunteer
      Json has been passed in request body with user data
      Send a json to confirm the creation of the company
    */
    public function removeVolunteer()
    {
          log_message('info', "fromStatusCtrl - removeVolunteer");
          $data = $this->jsonbourne->decodeReqBody();
          $result = $this->fromStatusModel->remove($data);
          echo count($result) >= 1 ?  $this->jsonbourne->forge(0, "The volunteer has been added", $result):  $this->jsonbourne->forge(1, "error in the add of volunteer", null);
    }

}
