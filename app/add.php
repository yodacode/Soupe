<?php 
	require_once('../curl/proxy.php');

	$proxy = new Proxy();

	$proxy->addPlace($_POST);	
	
	header('Location: index.php');
 ?>