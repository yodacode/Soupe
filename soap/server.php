<?php 
	require "lib/nusoap.php";	

	function getAutocompleteContacts($email, $num, $token) {
		$result = array();
		$result[] = array( 'contact' => 'Chaos Captain', 'email' => 'choas@sdfusidfousdf.com');
		$result[] = array( 'contact' => 'Joe Joe', 'email' => 'choas@sdf768sdf798s7df987.com');

		return $result;
	}
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

	$server = new nusoap_server();
	$server->configureWSDL("soupe", "urn:soupe");


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
	'urn:soupe', // namespace
	'urn:soupe',
	'rpc', // style
	'encoded', // use
	'Fetch array of address book contacts for use in autocomplete');

	$server->service($HTTP_RAW_POST_DATA);
	 
?>