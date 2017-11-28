<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends MY_Controller {

	public function index()
	{
		/* MY_Controller function mainPage */
		
		parent::mainPage('crud/index',[
			'title'	=> 'Crud, AJax'
		]);
	}


	/* Store Data */
	public function store() 
	{
		// print_r($this->security->get_csrf_hash());die;

		if($this->form_validation->run('crud_validate') == FALSE) {

			$error = [
				'token'	=> $this->security->get_csrf_hash(),
				'nameErr'		=> form_error('name') ,
				'positionErr'   => form_error('position'),
				'emailErr'		=> form_error('email'),
				"message"		=> "failed"
			];	
			echo json_encode($error);
			
		} else {		
			/* clean_data is for strip_tags */
			$insertData = [
				'name'	=>  clean_data($this->input->post('name')),
				'position' => clean_data($this->input->post('position')),
				'email' =>  clean_data($this->input->post('email')),
			];
			

			$this->Crud_model->insert('users',$insertData);
			$csrf = $this->security->get_csrf_hash();
			$this->output
			    ->set_content_type('application/json')
			    ->set_output(json_encode(array("message" => "success", 'csrf' => $csrf)));
		}
	}

	// public function show()
	// {
	// 	$order_by = "created_at desc";
	// 	$usersData = $this->Crud_model->fetch('users','','','',$order_by);
	// 	// $usersData = array();
	// 	$data['data']['data'] = array();
	// 	$id = 0;
	// 	$row = 0;

	// 	if(!$usersData == null) {
	// 		foreach($usersData as $userData) {
	// 			$data['data']['data'][$id][] = $userData->name;
	// 			$data['data']['data'][$id][] = $userData->position;
	// 			$data['data']['data'][$id][] = $userData->email;
	// 			$id++;
	// 			$row++;
	// 		}
	// 		$data['token'] = $this->security->get_csrf_hash();
		
	// 	}
	// 	echo json_encode($data['data']);

	// }
}
