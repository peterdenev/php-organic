<?php

require_once 'api/iChemical.php';

class Chemical implements iChemical{

	function __construct(array $data=null) {
		if(is_array($data) && !empty($data)){
			foreach($data as $key=>$value){				
				$this->$key = $value;
			}
		}
	}


}

?>