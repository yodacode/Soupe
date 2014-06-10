<?php
	require_once("../../config.php");

	$clientRest = new clientRest();
	$towns = $clientRest->getCountries();

	echo $towns;
 ?>