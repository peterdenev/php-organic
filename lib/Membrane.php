<?php

class Membrane{

	function __construct($nucleus, $plasma) {	
		$this->plasma = $plasma;
		$this->holes = $nucleus->createNamespace("membrane", $this);
	}

	function hole ($name){
		for($i=0; $i<count($this->holes); $i++) 
			if($this->holdes[$i]->name == $name)
				return $this->holdes[$i];		
	}

}

?>