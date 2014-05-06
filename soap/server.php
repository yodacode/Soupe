<?php 
	require "lib/nusoap.php";
	require "functions.php";

	var_dump($_SERVER['SCRIPT_URI']);
	die();
	
	$server = new nusoap_server();
	$server->configureWSDL("soap", "urn:" . $_SERVER['SCRIPT_URI']);

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : ”;

	//Create a complex type
	$server->wsdl->addComplexType(
		'Contact',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'contact' => array('name' => 'contact', 'type' => 'xsd:string'),
			'email' => array('name' => 'email', 'type' => 'xsd:string'),
		)
	);

	$server->wsdl->addComplexType(
		'ContactArray',
		'complexType',
		'array',		
		'',
		array(),
		array(
		array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Contact[]')
		),
		'tns:Contact'
	);


	$server->register('getAutocompleteContacts',
	array('email' => 'xsd:string', 'num' => 'xsd:int', 'token' => 'xsd:string'), // input parameters
	array('return' => 'tns:ContactArray'),
	'urn:'.$_SERVER['SCRIPT_URI'], // namespace
	'urn:'.$_SERVER['SCRIPT_URI'].'#getAutocompleteContacts', // soapaction
	'rpc', // style
	'encoded', // use
	'Fetch array of address book contacts for use in autocomplete');

	$server->service($HTTP_RAW_POST_DATA);
	 
?>