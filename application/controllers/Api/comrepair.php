<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Comrepair extends REST_Controller {

	public function __construct(){
		parent:: __construct();
		//$this->load->library('PHPRequests');
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

	public function login_post(){
		$username = $this->post('username');
		$password = $this->post('password');
		$fcm_token = $this->post('firebaseToken');

		$data = $this->api_model->login($username,$password)->result();
		
		$data1 = $this->api_model->login($username,$password)->row_array();

		$id_user = $data1['id_user'];


		if($data){

			$data_response = $this->api_model->update_fcmToken($id_user,$fcm_token)->result();

			if($data_response){
				$this->response($data_response,200);
			}else{
				$this->response(NULL,404);
			}

			// $this->response($data,200);

		}else{
			// $this->response(NULL,REST_Controller::HTTP_BAD_REQUEST);

			$data = array(
				array('error' => 'username หรือ password ไม่ถูกต้อง' )
				);

			$this->response($data,200);



		}
	}	
}