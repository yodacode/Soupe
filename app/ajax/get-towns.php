<?php 
	require_once("../../config.php");
	
	$clientRest = new clientRest();	
	$towns = $clientRest->getTowns(array('country_id' => $_GET['country_id']));	

	echo $towns;
 ?>