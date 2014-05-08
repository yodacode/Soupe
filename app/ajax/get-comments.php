<?php 	
	require_once "../../soap/lib/nusoap.php";
	require '../../soap/client/client.php';
	
	$clientSoap = new clientSoap();
	$comments = $clientSoap->getComments($_GET['place_id']);

	echo $comments;
?>