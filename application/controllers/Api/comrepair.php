<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Comrepair extends REST_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->library('PHPRequests');
		$this->load->model('api_model');
		
	}

	public function all_get() {
		$data = $this->api_model->AllData()->result();

		if($data){
			$this->response($data,200);
		}else{
			$this->response(NULL,404);
		}
	}	
}