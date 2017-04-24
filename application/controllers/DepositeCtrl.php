<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepositeCtrl extends CI_Controller
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
		$this->load->model('depositeModel');        // data layer
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
                public function getClothesOfUserOnExchange($idUser, $idExchange)
                {
				log_message('info', "DepositeCtrl - getClothesOfUserOnExchange");
				$deposites = $this->depositeModel->getClothesOfUserOnExchange($idUser, $idExchange);
				echo  $deposites >= 1 ?  $this->jsonbourne->forge(0, "deposites exists", $deposites):  $this->jsonbourne->forge(1, "no deposites for this volunteer", null);
		}
                
                public function getToysOfUserOnExchange($idUser, $idExchange)
                {
				log_message('info', "DepositeCtrl - getToysOfUserOnExchange");
				$deposites = $this->depositeModel->getToysOfUserOnExchange($idUser, $idExchange);
				echo  $deposites >= 1 ?  $this->jsonbourne->forge(0, "deposites exists", $deposites):  $this->jsonbourne->forge(1, "no deposites for this volunteer", null);
		}
                
                /**
                Request to get ALL articles of exchange
                Send a jsonArray of companies as a response
                */
                public function getArticlesOnExchange($idExchange)
                {
				log_message('info', "DepositeCtrl - getArticlesOnExchange");
				$deposites = $this->depositeModel->getArticlesOnExchange($idExchange);
				echo  $deposites >= 1 ?  $this->jsonbourne->forge(0, "deposites exists", $deposites):  $this->jsonbourne->forge(1, "no deposites for this volunteer", null);
		}
                
                /**
                Request to get ALL articles of exchange
                Send a jsonArray of companies as a response
                */
                public function amountByUser($idExchange)
                {
				log_message('info', "DepositeCtrl - amountByUser");
				$deposites = $this->depositeModel->amountByUser($idExchange);
				echo  $deposites >= 1 ?  $this->jsonbourne->forge(0, "deposites exists", $deposites):  $this->jsonbourne->forge(1, "no deposites for this volunteer", null);
		}

		/* _________________________ PUT _______________________ */
		/**
			Modify an article
			Send a json to confirm the update of the article
		*/
		public function modifyArticle()
		{
					log_message('info', "DepositeCtrl - modifyArticle");
					$data = $this->jsonbourne->decodeReqBody();
					$resultUpdate = $this->depositeModel->modify($data);
					echo count($resultUpdate) >= 1 ?  $this->jsonbourne->forge(0, "The article has been updated", $resultUpdate):  $this->jsonbourne->forge(1, "error in the update of the article", null);
		}

		/* _________________________ POST _______________________ */
		/**
			Create a new article in an exchange
			Json has been passed in request body with article datas
			Send a json to confirm the creation of the article
		*/
		public function createClothes()
		{
                    log_message('info', "DepositeCtrl - createClothes");
                    $articleData = $this->jsonbourne->decodeReqBody();
                    $resultFromCreateANewArticle = $this->depositeModel->createClothes($articleData);
                    echo count($resultFromCreateANewArticle) >= 1 
                        ?  $this->jsonbourne->forge(0, "The article has been created", $resultFromCreateANewArticle)
                        :  $this->jsonbourne->forge(1, "error in the creation of article", null);
		}
                
                public function createToy()
		{
                    log_message('info', "DepositeCtrl - createToy");
                    $articleData = $this->jsonbourne->decodeReqBody();
                    $resultFromCreateANewArticle = $this->depositeModel->createToy($articleData);
                    echo count($resultFromCreateANewArticle) >= 1 
                        ?  $this->jsonbourne->forge(0, "The article has been created", $resultFromCreateANewArticle)
                        :  $this->jsonbourne->forge(1, "error in the creation of article", null);
		}

		/* _________________________ DELETE _______________________ */
		/**
			Delete an article
			Json has been passed in request body with user data
			Send a json to confirm the suppression of the article
		*/
		public function deleteClothes()
		{
					log_message('info', "DepositeCtrl - createArticle");
					$articleData = $this->jsonbourne->decodeReqBody();
					$resultFromCreateANewArticle = $this->depositeModel->deleteClothes($articleData);
					echo count($resultFromCreateANewArticle) >= 1 ?  $this->jsonbourne->forge(0, "The article has been created", $resultFromCreateANewArticle):  $this->jsonbourne->forge(1, "error in the creation of article", null);
		}
                
                public function deleteToy()
		{
					log_message('info', "DepositeCtrl - createArticle");
					$articleData = $this->jsonbourne->decodeReqBody();
					$resultFromCreateANewArticle = $this->depositeModel->deleteToy($articleData);
					echo count($resultFromCreateANewArticle) >= 1 ?  $this->jsonbourne->forge(0, "The article has been created", $resultFromCreateANewArticle):  $this->jsonbourne->forge(1, "error in the creation of article", null);
		}

}
