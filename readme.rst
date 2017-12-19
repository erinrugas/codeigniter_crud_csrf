CODEIGNITER CRUD WITH CSRF

This is a one page Codeigniter Crud with csrf

==================
This Project Uses
==================

-Codeigniter 3.1.6
-Bootstrap 4.0.0-beta
-JQuery 3.2.1
-DataTables 1.10.16
-Font Awesome 4.7.0
-Bootstrap Notify


==============
Configurations
==============

1. Enable CSRF in application/config/config.php
  1.1 change csrf to TRUE 
  $config['csrf_protection'] = TRUE;

  1.2 disabled csrf_regenerate (optional) - csrf will not regenerate every submission.
  $config['csrf_regenerate'] = FALSE;

  1.3 rename csrf token and cookie name (optional)

2. Create MY_Controller in application/core/MY_Controller.php
   2.1 create a method that you need in MY_Controller

   2.2 Extends MY_Controller to your controller

   2.3 Create a method in MY_Controller and Call it to your Controller using parent::method_name(); 

3. Create a model for CRUD, you will just need to pass value through parameters in the controller.
	e.g. 
	$this->Crud_model->insert('tableName',$yourDataToBeInserted); - Insert into tableName
	$this->Crud_model->fetch('tableName'); - select * from tableName
	$this->Crud_model->fetchTagRow('specificColumn','tableName'); select specificColumn from tableName

4. Custom helper in application/helpers/custom_helper - this helper use for strip_tags and striplashes


-------------------------------------------------------
This is made to explore some features of codeigniter 
such as using the CORE & HELPER FOLDER and ENABLE CSRF.
-------------------------------------------------------