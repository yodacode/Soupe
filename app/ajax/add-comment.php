<?php 	
	require_once "../../soap/lib/nusoap.php";
	require '../../soap/client/client.php';
	
	$clientSoap = new clientSoap();

	$comment = $clientSoap->addComment($_POST);
	
?>