<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?></title>
	<base href="<?= base_url(); ?>" />
	<script type="text/javascript" src="public/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="public/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="public/font-awesome/css/font-awesome.min.css">
  <script src="public/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
  <script>
      var base_url = window.location.origin+"/codeigniter_crud_csrf/";

      var CFG = {
              token: '<?php echo $this->security->get_csrf_hash();?>'
          };
          
  </script>

<script type="text/javascript" src="public/js/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="public/js/notify_helper.js"></script>
<script src="public/js/custom.js"></script>
<script src="public/js/create.js"></script>
<script src="public/js/delete.js"></script>
<script src="public/js/update.js"></script>
    
</script>
<style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }
      .dropdown-menu {
        cursor: pointer;
      }

    </style>
</head>


<body>
   <div class="container">