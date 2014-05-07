<?php 
	require_once('../rest/client/client.php');

	$clientRest = new clientRest();

	$clientRest->addPlace($_POST);	
	
	header('Location: index.php');
 ?>