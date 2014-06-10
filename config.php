<?php
	// Class SOAP
	require_once('soap/lib/nusoap.php');
	require_once('soap/client/client.php');

	// Class REST
	require_once('rest/client/client.php');
	require_once('rest/server/Rest.php');

	// Constant
	define("ROOT_PATH", dirname(__FILE__));

	// Database
	define('DB_DNS', 'mysql:host=localhost;dbname=places');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');

?>
