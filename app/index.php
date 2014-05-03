<?php 	
	require_once('../proxy/proxy.php');
	
	$proxy = new Proxy();
	$places = $proxy->getPlaces();

	$xml = new SimpleXMLElement($places);
	$xsl = new DOMDocument;
	$xsl->load('xsl/listing.xsl');

	$proc = new XSLTProcessor();
	$proc->importStyleSheet($xsl);

	$data = $proc->transformToXML($xml);

	echo $data;
 ?>