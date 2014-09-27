<?php

require 'api/iDNA.php';

class DNA implements iDNA{

	function __construct($data=null) {	
		if($data){
			foreach($data as $key=>$value){
				$this->$key = $value;
			}
		}
	}
	
}



?>