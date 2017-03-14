<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentation extends CI_Controller {

	/**
	 * Documentation Page that will be the only page displayed 
	 *
	 * Maps to the following URL 
	 * 		http://example.com/index.php/documentation/ 
	 *	- or -
	 * 		http://example.com/documentation/   (with .htaccess rules)
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 */
	public function index()
	{
		$this->load->view('documentation');
	}
}