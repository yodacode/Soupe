<?php 	
	require_once("../../config.php");
	
	$clientSoap = new clientSoap();

	$comment = $clientSoap->addComment($_POST);
	
?>