<?php 
	function price($name){
		$details = array(
			'abc' => 100,
			'xyz' => 200,
		);
		foreach ($details as $k => $v) {
			if ($name == $k) {
				$price = $v;
			}
		}
		return $price;
	}


	function () {
		$result = array();
		$result[] = array( 'contact' => 'Chaos Captain', 'email' => 'choas@sdfusidfousdf.com');
		$result[] = array( 'contact' => 'Joe Joe', 'email' => 'choas@sdf768sdf798s7df987.com');

		return $result;
	}

 ?>