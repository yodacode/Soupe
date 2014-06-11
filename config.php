<?php
	// Class SOAP
	require_once('soap/lib/nusoap.php');
	require_once('app/soap/client.php');

	// Class REST
	require_once('app/rest/client.php');
	require_once('rest/server/Rest.php');

	// Constant
	define("ROOT_PATH", dirname(__FILE__));
	define("FULL_HOST", 'http://rest.dev/');

	define('URL_GET_PLACES', FULL_HOST . 'rest/server/places/');
	define('URL_DELETE_PLACE', FULL_HOST . 'rest/server/deletePlace/?id=');
	define('URL_ADD_PLACE', FULL_HOST . 'rest/server/addPlace');
	define('URL_GET_TOWNS', FULL_HOST . 'rest/server/towns');
	define('URL_GET_COUNTRIES', FULL_HOST . 'rest/server/countries');

	// Database
	define('DB_DNS', 'mysql:host=localhost;dbname=places');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');

?>
