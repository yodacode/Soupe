<?php 
	header("Content-type: text/xml; charset=utf-8");	
	require_once('../proxy/proxy.php');
	
	$proxy = new Proxy();
	
	$towns = $proxy->getTowns(array('country_id' => $_GET['country_id']));	

	echo $towns;
 ?>