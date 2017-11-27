<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends MY_Controller {

	public function index()
	{
		/* MY_Controller function mainPage */
		
		parent::mainPage('crud/index');
	}
}
