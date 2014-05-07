<?php 
	require_once "../lib/nusoap.php";

	$client = new nusoap_client("http://rest.dev/soap/server/server.php?wsdl");

	// Check for an error
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
		// At this point, you know the call that follows will fail
	}
	
	$result = $client->call('getComments', array('place_id'=> $_GET['town_id']));
	
	echo "<pre>";
	var_dump($result);
?>