<?php
	
	require_once("Rest.inc.php");

	class API extends REST {

		public $data = "";

		const DB_DNS = "mysql:host=localhost;dbname=users";
		const DB_USER = "root";
		const DB_PASSWORD = "root";


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
				$this->db = new PDO(self::DB_DNS, self::DB_USER, self::DB_PASSWORD);
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

		private function users(){

			// Cross validation if the request method is GET else it will return "Not Acceptable" status
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}

			$request = $this->db->prepare("SELECT user_id, user_fullname, user_email FROM users");
			$request->execute();
			$result = $request->fetchAll(PDO::FETCH_ASSOC);

			if(!empty($result)) {
				$this->response($this->xml($result), 200);
				
			}

			$this->response('', 204);	// If no records "No Content" status
		}

		private function deleteUser(){
			// Cross validation if the request method is DELETE else it will return "Not Acceptable" status
			$id = (int) $this->_request['id'];

			if($this->get_request_method() != "DELETE"){
				$this->response('',406);
			}

			if($id > 0) {
				$request = $this->db->prepare("DELETE FROM users WHERE user_id = :id");
				$request->execute(array('id' => $id));
				$this->response($this->json(array('response' => true)), 200);
			} else {
				$this->response('',204);	// If no records "No Content" status
			}
		}

		private function addUser(){
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}

			$params = array(
				'name' => $this->_request['name'],
				'email' 	=> $this->_request['email'],
				'password' => $this->_request['password'],
				'status' 	=> $this->_request['status'],
			);

			$request = $this->db->prepare("INSERT INTO users (user_fullname,user_email,user_password,user_status) VALUES (:name,:email,:password,:status)");
			$request->execute($params);

			
			$this->response($this->json($params), 200);	
			
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
				$root->addAttribute('newsPagePrefix', 'value goes here');

				foreach ($data as $k => $v) {					
					$item = $root->addChild('item');
					$item->addAttribute('id', $v['user_id']);

					//add chid node
					$name = $item->addChild('name');
					$email = $item->addChild('email');										


					$item->name = $v['user_fullname'];
					$item->email = $v['user_email'];
				}
				
				return $root->asXML();

			}
		}
	}

	// Initiiate Library

	$api = new API;
	$api->processApi();
?>