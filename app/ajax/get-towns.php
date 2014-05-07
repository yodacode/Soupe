<?php 
	header("Content-type: text/xml; charset=utf-8");	
	require_once('../../rest/client/client.php');
	
	$clientRest = new clientRest();	
	$towns = $clientRest->getTowns(array('country_id' => $_GET['country_id']));	

	echo $towns;
 ?>