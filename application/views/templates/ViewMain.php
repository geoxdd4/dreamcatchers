<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>

<html lang="fr">
<head>
	
	<meta charset="utf-8">
	<title><?=$title;?></title>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	
	<script src="<?= base_url().'assets/js/pace/pace.min.js'; ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url().'assets/js/pace/themes/pace-theme-flash.css'; ?>">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
	<link rel="stylesheet" type="text/css" href="<?= base_url().'assets/css/main_style.css'; ?>">
	
</head>
<body>


<?php
$this->load->view('ViewHeader');

$this->load->view($contents);

$this->load->view('ViewFooter');

$this->output->enable_profiler(TRUE);

?>


</body>

</html>