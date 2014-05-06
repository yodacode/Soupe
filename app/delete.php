<?php
	require_once('../curl/curl.php');

	$curl = new curl();
	$place = $curl->deletePlace($_GET['id']);
	header('Location: index.php');

 ?>