<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function index()
	{
		/* MY_Controller function mainPage */
		
		parent::mainPage('main/index');
	}
}
