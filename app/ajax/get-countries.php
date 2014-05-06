<?php 
	header("Content-type: text/xml; charset=utf-8");	
	require_once('../../curl/curl.php');
	
	$curl = new curl();	
	$towns = $curl->getCountries();

	echo $towns;
 ?>