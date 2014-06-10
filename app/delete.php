<?php
	require_once('../config.php');

	$clientRest = new clientRest();
	$place = $clientRest->deletePlace($_GET['id']);
	header('Location: index.php');

 ?>