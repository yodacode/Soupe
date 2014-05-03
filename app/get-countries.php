<?php 
	header("Content-type: text/xml; charset=utf-8");	
	require_once('../proxy/proxy.php');
	
	$proxy = new Proxy();	
	$towns = $proxy->getCountries();

	echo $towns;
 ?>