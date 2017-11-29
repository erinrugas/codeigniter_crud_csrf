<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends MY_Controller {

	public function index()
	{

		parent::mainPage('crud/index',[
			'title'	=> 'Crud, AJax'
		]);

	}


	/* Store Data */
	public function store() 
	{
		
		if($this->form_validation->run('add_validate') == FALSE) {

			$error = [
				'token'	=> $this->security->get_csrf_hash(),
				'nameErr'		=> form_error('name') ,
				'positionErr'   => form_error('position'),
				'emailErr'		=> form_error('email'),
			];	
			echo json_encode($error);
			
		} else {		
			/* clean_data is for strip_tags */
			$insertData = [
				
				'name'	=>  ucwords(clean_data($this->input->post('name'))),
				'position' => ucwords(clean_data($this->input->post('position'))),
				'email' =>  clean_data($this->input->post('email')),
			];
			
			$success = [
				'token'	=> $this->security->get_csrf_hash(),
				'message'	=> 'success'
			];


			$this->Crud_model->insert('users',$insertData);
			echo json_encode($success);
		}

	}

	/* Show Data */

	public function show()
	{

		$order_by = "created_at desc";
		$usersData = $this->Crud_model->fetch('users','','','',$order_by);
		$data['data']['data'] = array();
		$id = 0;
		$row = 0;

		if(!$usersData == null) {
			$token = $this->security->get_csrf_hash();
			foreach($usersData as $userData) {
				$data['data']['data'][$id][] = $userData->name;
				$data['data']['data'][$id][] = $userData->position;
				$data['data']['data'][$id][] = $userData->email;
				$data['data']['data'][$id][] = 
					"<button class='btn btn-secondary edit-data',
						data-token='$token' data-id='$userData->id'
						data-name='$userData->name' data-position='$userData->position'
						data-email='$userData->email' title='Edit'> 
						<i class='fa fa-pencil'></i> 
					</button>
					<button class='btn btn-danger delete-data',
						data-toggle='modal' data-token='$token'
						data-id='$userData->id' data-name='$userData->name' 
						data-position='$userData->position' data-email='$userData->email' 
						title='Delete'> 
						<i class='fa fa-trash'></i> 
					</button>";
				$id++;
				$row++;
			}
		}
		
		echo json_encode($data['data']);

	}


	/* Update Data */
	public function update()
	{
		if($this->form_validation->run('update_validate') == FALSE) {

			$error = [
				'token'	=> $this->security->get_csrf_hash(),
				'nameErr'		=> form_error('name') ,
				'positionErr'   => form_error('position'),
				'emailErr'		=> form_error('email'),
			];	
			echo json_encode($error);
			
		} else {		
			/* clean_data go to helper/custom_helper.php */
			$updateData = [
				'name'	=>  ucwords(clean_data($this->input->post('name'))),
				'position' => ucwords(clean_data($this->input->post('position'))),
				'email' =>  clean_data($this->input->post('email')),
			];
			$success = [
				'token'	=> $this->security->get_csrf_hash(),
				'message'	=> 'success'
			];

			$where = ['id' => $this->input->post('id')];
			$this->Crud_model->update('users',$updateData,$where);
			echo json_encode($success);
		}
	}

	public function delete()
	{
		$where = ['id' => $this->input->post('deleteid')];
		$this->Crud_model->delete('users',$where);
		$success = [
				'token'	=> $this->security->get_csrf_hash(),
				'message'	=> 'success'
			];
		echo json_encode($success);
	}
}
