<?php
	class Proxy {

		const URL_GET_PLACES = 'http://rest.dev/api/places/';
		public $_curl;

		public function __construct(){

			// Get cURL resource
			$this->_curl = curl_init();

		}

		public function getPlaces($filter = array()){

			// Set some options - we are passing in a useragent too here
			curl_setopt_array($this->_curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => self::URL_GET_PLACES . '?' . http_build_query($filter),
			));

			// Send the request & save response to $resp
			$resp = curl_exec($this->_curl);

			// We need to get Curl infos for the header_size and the http_code
			$apiRespInfo = curl_getinfo($this->_curl);

			// Close request to clear up some resources
			curl_close($this->_curl);

			http_response_code($apiRespInfo['http_code']);

			return $resp;

		}

	}
 ?>