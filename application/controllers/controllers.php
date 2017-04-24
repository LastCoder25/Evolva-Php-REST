<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeOfClothesCtrl extends CI_Controller
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
		$this->load->model('typeOfClothesModel');        // data layer
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
    Send a jsonArray of type of clothes as a response
    */
    public function getTypeOfClothes()
    {
        $arrayTOC = $this->typeOfClothesModel->getAllTypeOfClothes(); // request to model
        //return a json
				echo count($arrayTOC) > 1 ?  $this->jsonbourne->forge(0, "Types of clothes", $arrayTOC):  $this->jsonbourne->forge(1, "no type of clothes", null);
    }

}
