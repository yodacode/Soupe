<?php
	require_once('../rest/client/client.php');

	$clientRest = new clientRest();
	$place = $clientRest->deletePlace($_GET['id']);
	header('Location: index.php');

 ?>