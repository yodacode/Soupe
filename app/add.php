<?php 
	require_once('../proxy/proxy.php');

	$proxy = new Proxy();

	$proxy->addPlace($_POST);	
	
	header('Location: index.php');
 ?>