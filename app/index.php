<?php 	
	require_once('../curl/curl.php');
	
	var_dump($_GET);
	
	$curl = new curl();
	$places = $curl->getPlaces($_GET);

	$xml = new SimpleXMLElement($places);
	$xsl = new DOMDocument;
	$xsl->load('xsl/listing.xsl');

	$proc = new XSLTProcessor();
	$proc->importStyleSheet($xsl);

	$data = $proc->transformToXML($xml);

	echo $data;
 ?>