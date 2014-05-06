<?php 
	require_once('../curl/curl.php');

	$curl = new curl();

	$curl->addPlace($_POST);	
	
	header('Location: index.php');
 ?>