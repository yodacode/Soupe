<?php 	
	require_once('../proxy/proxy.php');
	
	var_dump($_GET);
	
	$proxy = new Proxy();
	$places = $proxy->getPlaces($_GET);

	$xml = new SimpleXMLElement($places);
	$xsl = new DOMDocument;
	$xsl->load('xsl/listing.xsl');

	$proc = new XSLTProcessor();
	$proc->importStyleSheet($xsl);

	$data = $proc->transformToXML($xml);

	echo $data;
 ?>