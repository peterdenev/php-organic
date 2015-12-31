<?php

require_once 'api/iDNA.php';

class DNA implements iDNA{

	function __construct(array $data=null) {	
		if($data){
			foreach($data as $key=>$value){
				$this->$key = $value;
			}
		}
	}
	
}



?>