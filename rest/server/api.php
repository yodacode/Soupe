<?php

	require_once("../../config.php");

	class API extends REST {

		public $data = "";

		private $db = NULL;

		public function __construct(){
			parent::__construct();				// Init parent contructor
			$this->dbConnect();					// Initiate Database connection
		}

		/*
		 *  Database connection
		*/
		private function dbConnect(){

			try {
				$this->db = new PDO(DB_DNS, DB_USER, DB_PASSWORD);
			} catch (Exception $e) {
				return 'Erreur : '. $e->getMessage();
			}

		}

		/*
		 * Public method for access api.
		 * This method dynmically call the method based on the query string
		 *
		 */
		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404);				// If the method not exist with in this class, response would be "Page not found".
		}

		private function places(){
			// Cross validation if the request method is GET else it will return "Not Acceptable" status
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$sql = sprintf('SELECT * FROM place %s %s',
               !empty($this->_request['id']) ? 'WHERE id = :id' : null,
               !empty($this->_request['town_id']) ? 'WHERE town_id = :town_id' : null);

			$request = $this->db->prepare($sql);

			if (!empty($this->_request['id'])) {
				$id = $this->_request['id'];
    			$request->bindParam(':id', $id, PDO::PARAM_INT);
			}

			if (!empty($this->_request['town_id'])) {
				$townId = $this->_request['town_id'];
    			$request->bindParam(':town_id', $townId, PDO::PARAM_INT);
			}

			$request->execute();
			$result = $request->fetchAll(PDO::FETCH_ASSOC);

			if(!empty($result)) {
				$this->response($this->xml($result), 200);
			}

			$this->response('', 204);	// If no records "No Content" status

		}

		private function deletePlace(){
			// Cross validation if the request method is DELETE else it will return "Not Acceptable" status
			$id = (int) $this->_request['id'];

			if($this->get_request_method() != "DELETE"){
				$this->response('',406);
			}

			$params = array(
				'id' => $this->_request['id']
			);

			//if there is missing parameters
			if ($this->hasMissingParameters($params)) {
				$this->response($this->xml(array('response' => 'missing parameter id')), 400);
			}

			if($id > 0) {
				$request = $this->db->prepare("DELETE FROM place WHERE id = :id");
				$request->execute(array('id' => $id));
				$this->response($this->xml(array('response' => 'place has been deleted where id : ' . $id)), 200);
			} else {
				$this->response('', 204);	// If no records "No Content" status
			}
		}

		private function addPlace(){
			if($this->get_request_method() != "POST"){
				$this->response('', 406);
			}

			$params = array(
				'name' 			=> $this->_request['name'],
				'address' 		=> $this->_request['address'],
				'description' 	=> $this->_request['description'],
				'latitude' 		=> $this->_request['latitude'],
				'longitude' 	=> $this->_request['longitude'],
				'town_id' 		=> $this->_request['town_id'],
			);

			//if there is missing parameters
			if ($this->hasMissingParameters($params)) {
				$this->response($this->xml(array('response' => 'missing parameters')), 400);
			}

			$request = $this->db->prepare("INSERT INTO place (name,address,description,latitude,longitude, town_id) VALUES (:name,:address,:description,:latitude,:longitude,:town_id)");
			$request->execute($params);

			$this->response($this->xml($params), 200);

		}

		private function towns(){

			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$sql = sprintf('SELECT * FROM town %s',
               !empty($this->_request['country_id']) ? 'WHERE country_id = :country_id' : null);

			$request = $this->db->prepare($sql);

			if (!empty($this->_request['country_id'])) {
				$countryId = $this->_request['country_id'];
    			$request->bindParam(':country_id', $countryId, PDO::PARAM_INT);
			}

			$request->execute();
			$result = $request->fetchAll(PDO::FETCH_ASSOC);

			if(!empty($result)) {
				$this->response($this->xml($result), 200);
			}

			$this->response('', 204);	// If no records "No Content" status
		}

		private function countries(){

			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$sql = sprintf('SELECT * FROM country');

			$request = $this->db->prepare($sql);

			$request->execute();
			$result = $request->fetchAll(PDO::FETCH_ASSOC);

			if(!empty($result)) {
				$this->response($this->xml($result), 200);
			}

			$this->response('', 204);	// If no records "No Content" status
		}

		/*
		 *	Encode array into JSON
		*/
		private function json($data){
			$this->setContentType('application/json');
			if(is_array($data)){
				return json_encode($data);
			}
		}

		/*
		 *	Encode array into JSON
		*/
		private function xml($data){

			$this->setContentType('application/xml');
			if(is_array($data)){
				$root = new SimpleXMLElement("<root></root>");

					foreach ($data as $k => $v) {

						if (is_array($v)) {

							$item = $root->addChild('item');
							$item->addAttribute('id', $v['id']);

							foreach ($v as $kk => $vv) {
								$item->addChild($kk);
								$item->$kk = $vv;
							}

						} else {
							$item = $root->addChild($k);
							$root->$k = $v;
						}

					}

				return $root->asXML();

			}
		}
	}

	// Initiiate Library

	$api = new API;
	$api->processApi();
?>