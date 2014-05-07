<?php 	
	require_once('../rest/client/client.php');
	
	var_dump($_GET);
	
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