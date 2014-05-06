<?php 
  $server = new soap_server;
  $server->configureWSDL('addressbook1', 'urn:'.$_SERVER['SCRIPT_URI']);
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

  $server->register(‘getAutocompleteContacts',
  array(‘email' => ‘xsd:string', ‘num' => ‘xsd:int', ‘token' => ‘xsd:string'), // input parameters
  array(‘return' => ‘tns:ContactArray'),
  ‘urn:'.$_SERVER['SCRIPT_URI'], // namespace
  urn:'.$_SERVER['SCRIPT_URI'].”#getAutocompleteContacts”, // soapaction
  ‘rpc', // style
  ‘encoded', // use
  ‘Fetch array of address book contacts for use in autocomplete'); // documentation
?>