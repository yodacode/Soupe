<?php 
	require_once('../config.php');

	$clientRest = new clientRest();

	$clientRest->addPlace($_POST);	
	
	header('Location: index.php');
 ?>