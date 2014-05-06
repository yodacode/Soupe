<?php 
	require_once('../curl/curl.php');

	$curl = new curl();
	$place = $curl->getPlaces(array('id' => $_GET['id']));

	$xml = new SimpleXMLElement($place);
	$xsl = new DOMDocument;
	$xsl->load('xsl/detail.xsl');

	$proc = new XSLTProcessor();
	$proc->importStyleSheet($xsl);

	$data = $proc->transformToXML($xml);

	echo $data;

 ?>