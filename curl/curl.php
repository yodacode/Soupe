<?php
	class curl {

		const URL_GET_PLACES = 'http://rest.dev/api/places/';
		const URL_DELETE_PLACE = 'http://rest.dev/api/deletePlace/?id=';
		const URL_ADD_PLACE = 'http://rest.dev/api/addPlace';
		const URL_GET_TOWNS = 'http://rest.dev/api/towns';
		const URL_GET_COUNTRIES = 'http://rest.dev/api/countries';

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

		public function deletePlace($id){

			// Set some options - we are passing in a useragent too here
			curl_setopt_array($this->_curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_CUSTOMREQUEST => 'DELETE',
			    CURLOPT_URL => self::URL_DELETE_PLACE . $id,
			));

			// Send the request & save response to $resp
			$resp = curl_exec($this->_curl);

			// We need to get Curl infos for the header_size and the http_code
			$apiRespInfo = curl_getinfo($this->_curl);

			// Close request to clear up some resources
			curl_close($this->_curl);

			http_response_code($apiRespInfo['http_code']);

		}


		public function addPlace($params){

			// Set some options - we are passing in a useragent too here
			curl_setopt_array($this->_curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_POST => true,
			    CURLOPT_POSTFIELDS => http_build_query($params),
			    CURLOPT_URL => self::URL_ADD_PLACE,
			));

			// Send the request & save response to $resp
			$resp = curl_exec($this->_curl);


		  	// We need to get Curl infos for the header_size and the http_code
			$apiRespInfo = curl_getinfo($this->_curl);

			// Close request to clear up some resources
			curl_close($this->_curl);

			//set the http code
			http_response_code($apiRespInfo['http_code']);

			return $resp;
		}


		public function getTowns($filter = array()){

			// Set some options - we are passing in a useragent too here
			curl_setopt_array($this->_curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => self::URL_GET_TOWNS . '?' . http_build_query($filter),
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

		public function getCountries(){

			// Set some options - we are passing in a useragent too here
			curl_setopt_array($this->_curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => self::URL_GET_COUNTRIES,
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