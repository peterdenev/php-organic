<?php

class DNA{
	function __construct($data=null) {	
		if($data){
			foreach($data as $key=>$value){
				$this->$key = $value;
			}
		}
	}

	// more functions... :)

	function selectBranch($namespace) {
	  if($namespace == "")
	    return $this;
	  if(strrpos($namespace,'.') === false)
	    return isset($this->$namespace) ? $this->$namespace  : null;
	  $b = $this;
	  $currentB = "";
	  foreach(explode(".",$namespace) as $p){
	    if(!isset($b[$p]))
	      $b = $b[$p];
	    else
	      throw new Exception("can not walk to branch '".$namespace."' found gap at ".$currentB);
	    $currentB .= "."+$p;
	  }
	  return $b;
	}

	// more functions... :)

}



?>