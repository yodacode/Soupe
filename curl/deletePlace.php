<?php
	header('Content-Type: application/xml; charset=utf-8');
	
	// Get cURL resource
	$curl = curl_init();

	$params = array(	  
	  'id' => isset($_GET['id']) ? $_GET['id'] : null,
	);

	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER => 1,	    
	    CURLOPT_CUSTOMREQUEST => 'DELETE',
	    CURLOPT_URL => 'http://rest.dev/api/deletePlace/?' . http_build_query($params),
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);

	
  	// We need to get Curl infos for the header_size and the http_code
	$apiRespInfo = curl_getinfo($curl);
	
	// Close request to clear up some resources
	curl_close($curl);

	
	// Here we separate the Response Header from the Response Body	
	$apiRespHeader = trim(substr($resp, 0, $apiRespInfo['header_size']));
	$apiResponsBody = substr($resp, $apiRespInfo['header_size']);

	//set the http code 
	http_response_code($apiRespInfo['http_code']);
	
	echo $resp;
 ?>