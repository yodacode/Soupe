<?php
$test_array = array (
  'bla' => 'blub',
  'foo' => 'bar',
  'another_array' => array (
    'stack' => 'overflow',
  ),
);

// $xml = new SimpleXMLElement('<root/>');
// array_walk_recursive($test_array, array ($xml, 'addChild'));
// Header('Content-type: text/xml');
// echo $xml->asXML();

$newsXML = new SimpleXMLElement("<news></news>");
$newsXML->addAttribute('newsPagePrefix', 'value goes here');
$newsIntro = $newsXML->addChild('content');
$newsIntro->addAttribute('type', 'latest');

$newsIntro->addChild('prout');

Header('Content-type: text/xml');
echo $newsXML->asXML();
?>