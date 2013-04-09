<?php

class Chemical{

	function __construct($input=null, $data=null) {	

		if(gettype($input)=='string'){
			$input_obj = json_decode($input,true);
			if($input_obj !== null){
				$input = $input_obj;
				unset($input_obj);
			}
		}

		if(is_array($input)){
			foreach($input as $key=>$value){				
				$this->$key = $value;
			}
		}else{			
			$this->type = $input;
			$this->data = $data;
		}
	}


}

?>