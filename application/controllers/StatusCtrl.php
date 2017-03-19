<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusCtrl extends CI_Controller
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
		$this->load->model('statusModel');        // data layer
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
    public function getStatus()
    {
        $arrayOStatus = $this->statusModel->getAllStatus(); // request to model
        //return a json
		echo  count($arrayOStatus) > 1 ?  $this->jsonbourne->forge(0, "Status exist", $arrayOStatus):  $this->jsonbourne->forge(1, "no status", null);
    }

    /**
    Request to get a specific getCompany
    @params $statusId status's id
    Send a json of company data
    */
     public function getcompany($companyId)
    {
        $companyData = $this->companyModel->getCompanyData($companyId); // request to model
        //return a json
		echo  count($companyData) > 1 ?  $this->jsonbourne->forge(0, "Company data", $companyData):  $this->jsonbourne->forge(1, "no company", null);
    }


	/* _________________________ POST _______________________ */

	/**
	Create a new company
    Json has been passed in request body with company data
    Send a json to confirm the creation of the company
	*/
	public function setCompany()
	{
        $companyData = $this->jsonbourne->decodeReqBody();                           //get json
		$resultFromCreateANewCompany = $this->companyModel->create($input_data);     // pass arguments as array
		echo  count($resultFromCreateANewCompany) > 1 ?  $this->jsonbourne->forge(0, "The company has been created", $resultFromCreateANewCompany):  $this->jsonbourne->forge(1, "error in the creation of compnay", null);
	}

	/**
	Verify if company exists
	@params $companyId company's id
	Send json array
	*/
	public function checkCompany($companyId)
	{
		// connect to model to request db
        $companyExists = $this->companyModel->companyExists($companyId);
		echo  $companyExists == 1 ?  $this->jsonbourne->forge(0, "company exists", null):  $this->jsonbourne->forge(1, "no company", null);
	}


	/**
	verify if version of software is up to date
    @params $companyId company id
    @params $version version to compare
    Send json array with a response message
	*/
	public function checkVersion($companyId, $version)
	{
		$companyUpToDate = $this->companyModel->companyUpToDate($companyId, $version);
        echo  $companyUpToDate == true ?  $this->jsonbourne->forge(0, "up to date", null):  $this->jsonbourne->forge(1, "need to be updated", null);
	}

    /* _________________________ UPDATE _______________________ */

    public function updateCompany($companyId)
    {
        # code...get $companyId + json
    }

    /* _________________________ DELETE _______________________ */

	/**
	Delete specific company
	@params company id
	*/
	public function deleteCompany($companyId)
	{
		$result = $this->companyModel->delete($companyId);
		echo $this->jsoncreator->forge(0, $result, null);
	}

}
