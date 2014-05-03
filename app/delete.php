<?php
	require_once('../proxy/proxy.php');

	$proxy = new Proxy();
	$place = $proxy->deletePlace($_GET['id']);
	header('Location: index.php');

 ?>