<?php 
	header("Content-type: text/xml; charset=utf-8");	
	require_once('../../rest/client/client.php');
	
	$clientRest = new clientRest();	
	$towns = $clientRest->getCountries();

	echo $towns;
 ?>