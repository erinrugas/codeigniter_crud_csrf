<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends MY_Controller {

	public function index()
	{
		/* MY_Controller function mainPage */
		
		parent::mainPage('crud/index');
	}


	/* Store Data */
	public function store() 
	{
		$this->form_validation->set_error_delimiters('<div class="is-invalid">', '</div>');
		if($this->form_validation->run('crud_validate') == FALSE) {
			
			$error = [
				'nameErr'		=> form_error('name') ,
				'positionErr'   => form_error('position'),
				'emailErr'		=> form_error('email')
			];	
			echo json_encode($error);
			
		} else {

			/* clean_data found in custom helper */
			$insertData = [
				'name'	=>  clean_data($this->input->post('name')),
				'position' => clean_data($this->input->post('position')),
				'email' =>  clean_data($this->input->post('email'))
			];

			$this->Crud_model->insert('users',$insertData);

			echo json_encode("success");


		}
	}
}
