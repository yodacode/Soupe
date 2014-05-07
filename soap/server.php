<?php 
	require "lib/nusoap.php";	

	function getComments($place_id) {


		$comments = new SimpleXMLElement('comments.xml', NULL, TRUE);
		$result = array();
		
		foreach($comments->xpath('//comment[place_id="'.$place_id.'"]') as $comment) {				
			$result[] = array( 
				'author' 	=> (string)$comment->author, 
				'content' 	=> (string)$comment->content, 
				'rate' 		=> (int)$comment->rate, 
				'place_id' 	=> (int)$comment->place_id
			);
		}

		return $result;
	}
	
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

	$server = new nusoap_server();
	$server->configureWSDL("soupe", "urn:soupe");


	//Create a complex type
	$server->wsdl->addComplexType(
		'Comment',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'author' => array('name' => 'author', 'type' => 'xsd:string'),
			'content' => array('name' => 'content', 'type' => 'xsd:string'),
			'rate' => array('name' => 'rate', 'type' => 'xsd:int'),
			'place_id' => array('name' => 'place_id', 'type' => 'xsd:int'),
		)
	);

	$server->wsdl->addComplexType(
		'CommentArray',
		'complexType',
		'array',		
		'',
		array(),
		array(
		array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Comment[]')
		),
		'tns:Comment'
	);


	$server->register('getComments',
	array('place_id' => 'xsd:int'), // input parameters
	array('return' => 'tns:CommentArray'),
	'urn:soupe', // namespace
	'urn:soupe',
	'rpc', // style
	'encoded', // use
	'Fetch array of address book contacts for use in autocomplete');

	$server->service($HTTP_RAW_POST_DATA);
	 
?>