<?php 
	require_once('../curl/proxy.php');

	$proxy = new Proxy();
	$place = $proxy->deletePlace($_GET['id']);
	header('Location: index.php');
 ?>