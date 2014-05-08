<?php

	require_once('../../rest/client/client.php');

	$clientRest = new clientRest();
	$towns = $clientRest->getCountries();

	echo $towns;
 ?>