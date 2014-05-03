<?php 
	require_once('../proxy/proxy.php');

	$proxy = new Proxy();
	$place = $proxy->getPlaces(array('id' => $_GET['id']));

	$xml = new SimpleXMLElement($place);
	$xsl = new DOMDocument;
	$xsl->load('xsl/detail.xsl');

	$proc = new XSLTProcessor();
	$proc->importStyleSheet($xsl);

	$data = $proc->transformToXML($xml);

	echo $data;

 ?>