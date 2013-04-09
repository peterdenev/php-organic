<?php

class Plasma{
	
	var $_listeners = array();

	function emit($chemical, $sender, $callback=null){
		if(is_callable($sender)){
			$callback = $sender;
			$sender = null;
		}

		for($i=0; $i<count($this->_listeners); $i++){
			$listener = $this->_listeners[$i];

			// prevent emitting to self
		    if(isset($sender) && $sender == $listener['context'])
		      continue;
		  
		  	// if chemical.type matches pattern as string
		    if(($chemical->type && $listener['chemicalPattern'] === $chemical->type) ||
		    // or matches by type instance 		    	
		      (is_callable($listener['chemicalPattern']) && $chemical instanceof $listener['chemicalPattern']) ||
		    // or matched by chemical type only
		      $chemical === $listener['chemicalPattern']) {

		      // self remove from listeners if "once" has been invoked
		      if(isset($listener['once']) && $listener['once']) {		      	      	
		        unset($this->_listeners[$i]);	       
		        $i -= 1;
		      }

		      $chemicalRecieved = $listener['handle']($chemical, $sender, $callback);

		      // in case plasma organelles received the chemical, further iterations are not allowed.
		      if($chemicalRecieved !== false)
		        return;
		    }
		}
	}

	function once($chemicalPattern, $handler, $context=null) {		
		array_push($this->_listeners, 
			array(	"chemicalPattern" => $chemicalPattern,
					"handle"=> $handler,
					"context"=> $context,
					"once"=> true
				)					
		);		
	}

	function on($chemicalPattern, $handler, $context=null){		
		array_push( $this->_listeners,
			array(	"chemicalPattern" => $chemicalPattern,
					"handle"=> $handler,
					"context"=> $context					
			)	
		);		
	}

	function off($chemicalPattern, $handler){
	  	for($i = 0; $i<count($this->_listeners); $i++) {
	    	$listener = $this->_listeners[$i];
	    	if($listener->chemicalPattern == $chemicalPattern && $listener->handle == $handler)
		    	unset($this->_listeners[$i]);
	  	}
	}

}

?>