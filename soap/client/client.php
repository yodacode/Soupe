<?php 
	
	class clientSoap {
	
		public $_client;

		public function __construct(){
			$this->_client = new nusoap_client(FULL_HOST . "soap/server/server.php?wsdl");
		}

		public function getComments($townId){

			$err = $this->_client->getError();
			if ($err) {
				// Display the error
				echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
				// At this point, you know the call that follows will fail
			}

			$result = $this->_client->call('getComments', array('place_id'=> $_GET['place_id']));

			return $this->xml($result);
		}

		public function addComment($data){

			$err = $this->_client->getError();
			if ($err) {
				// Display the error
				echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
				// At this point, you know the call that follows will fail
			}
			
			$result = $this->_client->call('addComment', 
				array(
					'author' 	=> $data['author'], 
					'content' 	=> $data['content'], 
					'rate' 		=> $data['rate'], 
					'place_id' 	=> $data['place_id']
				)
			);

			return $result;
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

		public function setContentType($type) {		
			header("Content-Type:".$type);
		}		

	}

?>