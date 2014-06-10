<?php 	
	require_once('../config.php');
	
	$clientRest = new clientRest();
	$places = $clientRest->getPlaces($_GET);

	$xml = new SimpleXMLElement($places);
	$xsl = new DOMDocument;
	$xsl->load('xsl/listing.xsl');

	$proc = new XSLTProcessor();
	$proc->importStyleSheet($xsl);

	$data = $proc->transformToXML($xml);

	echo $data;
 ?>