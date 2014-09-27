<?php

require 'api/iChemical.php';

class Chemical implements iChemical{

	function __construct($data=null) {
		if(is_array($data) && !empty($data)){
			foreach($data as $key=>$value){				
				$this->$key = $value;
			}
		}
	}


}

?>