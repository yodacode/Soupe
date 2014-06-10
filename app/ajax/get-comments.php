<?php 	
	require_once("../../config.php");
	
	$clientSoap = new clientSoap();
	$comments = $clientSoap->getComments($_GET['place_id']);

	echo $comments;
?>