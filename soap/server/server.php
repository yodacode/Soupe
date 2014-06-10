<?php 
	require_once("../../config.php");

	function getComments($place_id) {


		$comments = new SimpleXMLElement('../data/comments.xml', NULL, TRUE);
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

	function addComment($author, $content, $rate, $place_id){
		//chmod("../data/comments.xml", 777);		x
		$xml_str = file_get_contents('../data/comments.xml');
		$xml = new SimpleXMLElement($xml_str);
		$comments = $xml->xpath('//comments');
		$comments = $comments [0];
		$comment = $comments->addChild('comment');
		$comment->addChild('author', $author);
		$comment->addChild('content', $content);
		$comment->addChild('rate', $rate);
		$comment->addChild('place_id', $place_id);
		file_put_contents('../data/comments.xml', $xml->asXML());

		$result = array( 
			'author' 	=> $author, 
			'content' 	=> $content, 
			'rate' 		=> $rate, 
			'place_id' 	=> $place_id
		);

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
			'author' 	=> array('name' => 'author', 'type' => 'xsd:string'),
			'content' 	=> array('name' => 'content', 'type' => 'xsd:string'),
			'rate' 		=> array('name' => 'rate', 'type' => 'xsd:int'),
			'place_id' 	=> array('name' => 'place_id', 'type' => 'xsd:int'),
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

	$server->register('addComment',
	array(
		'author' => 'xsd:string',
		'content' => 'xsd:string',
		'rate' => 'xsd:int',
		'place_id' => 'xsd:int'
	), // input parameters
	array('return' => 'tns:Comment'),
	'urn:soupe', // namespace
	'urn:soupe',
	'rpc', // style
	'encoded', // use
	'Fetch array of address book contacts for use in autocomplete');

	$server->service($HTTP_RAW_POST_DATA);
	 
?>