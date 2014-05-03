<?php 
	require_once('../curl/proxy.php');

	$proxy = new Proxy();
	$place = $proxy->getPlaces(array('id' => $_GET['id']));

	var_dump($place);


 ?>