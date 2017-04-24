<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TokenCtrl extends CI_Controller
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
		$this->load->model('tokenModel');        // data layer
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
    Request to get idUser from token
    */
    public function getIdUserFromToken()
    {
        log_message('info', "TokenCtrl - getIdUserFromToken");
	$data = $this->jsonbourne->decodeReqBody();
	$result = $this->tokenModel->getIdUserFromToken($data);
	echo (count($result) > 0) ?  $this->jsonbourne->forge(0, "session ok", $result):  $this->jsonbourne->forge(1, "no session", null);
    }
    
    /* _________________________   DELETE ______________________ */
    /**
    Request to delete idUser from token
    */
    public function deleteSession()
    {
        log_message('info', "TokenCtrl - deleteSession");
	$data = $this->jsonbourne->decodeReqBody();
	$result = $this->tokenModel->deleteSession($data);
	echo ($result=="ok") ?  $this->jsonbourne->forge(0, "delete token ok", $result):  $this->jsonbourne->forge(1, "error delete token", null);
    }

}
