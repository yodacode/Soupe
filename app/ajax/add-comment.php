<?php 	
	require_once "../../soap/lib/nusoap.php";
	require '../../soap/client/client.php';
	
	$clientSoap = new clientSoap();

	// $post = array(
	// 	'author' 	=> "micheline",
	// 	'content' 	=> "I like big dicks",
	// 	'rate' 		=> 9,
	// 	'place_id' 	=> 3,
	// );
	$comment = $clientSoap->addComment($_POST);

	var_dump($comment);
	
?>