<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?=base_url(array("assets", "bootstrap-3.3.4-dist", "css", "bootstrap.min.css"))?>">
	<script src="<?=base_url(array("assets", "jquery", "jquery-2.1.3.min.js"))?>"></script>
	<script src="<?=base_url(array("assets", "bootstrap-3.3.4-dist", "js", "bootstrap.min.js"))?>"></script>
	<style type="text/css">

	</style>
</head>
<body>

<div class="container">
	<div class="jumbotron">
    	<h1><?php echo $page_header ?></h1>
    	<p><?php echo $message ?></p> 
  	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>