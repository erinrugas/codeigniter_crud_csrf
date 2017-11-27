<?php

$config =
[
	'crud_validate'
	=>	[
		    [
	          	'field'    =>    'name',
	          	'label'    => 	 'Name',
	          	'rules'    => 	 'required'
	        ],

	        [
	        	'field'    =>    'position',
	        	'label'	   =>    'Position',
	        	'rules'	   =>    'required'
	        ],

	        [
	        	'field'    =>    'email',
	        	'label'	   =>    'Email',
	        	'rules'	   =>    'required|is_unique[users.email]|valid_email',
	        	'errors'   =>    [ 'is_unique' => '%s already taken.', 'valid_email' => 'This must contain a valid %s.' ]

	        ],
	    ]

];