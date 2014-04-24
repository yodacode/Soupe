<?php

	/*
		This is an example class script proceeding secured API
		To use this class you should keep same as query string and function name
		Ex: If the query string value rquest=delete_user Access modifiers doesn't matter but function should be
		     function delete_user(){
				 You code goes here
			 }
		Class will execute the function dynamically;

		usage :

		    $object->response(output_data, status_code);
			$object->_request	- to get santinized input

			output_data : JSON (I am using)
			status_code : Send status message for headers

		Add This extension for localhost checking :
			Chrome Extension : Advanced REST client Application
			URL : https://chrome.google.com/webstore/detail/hgmloofddffdnphfgcellkdfbfbjeloo

		I used the below table for demo purpose.

		CREATE TABLE IF NOT EXISTS `users` (
		  `user_id` int(11) NOT NULL AUTO_INCREMENT,
		  `user_fullname` varchar(25) NOT NULL,
		  `user_email` varchar(50) NOT NULL,
		  `user_password` varchar(50) NOT NULL,
		  `user_status` tinyint(1) NOT NULL DEFAULT '0',
		  PRIMARY KEY (`user_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 	*/

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
				$this->response($this->json($result), 200);
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
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}

	// Initiiate Library

	$api = new API;
	$api->processApi();
?>