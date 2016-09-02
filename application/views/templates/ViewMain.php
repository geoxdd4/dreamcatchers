<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>

<html lang="fr">
<head>
	
	<meta charset="utf-8">
	<title><?=$title;?></title>
	
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<style>
	* {
		font-family: "Roboto";
	}
	</style>
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