<?php
require_once 'api/iPlasma.php';


class Plasma implements iPlasma{
	
	var $_listeners = [];

	function emit($chemical, Callable $callback=null){
		require_once 'Chemical.php';
	  	$chemical = $chemical instanceof Chemical ? $chemical : new Chemical($chemical);
		
		for($i=0; $i<count($this->_listeners); $i++){
			$listener = $this->_listeners[$i];	
		  	// if chemical.type matches pattern as string
		    if((isset($chemical->type) && $listener['chemicalPattern'] === $chemical->type) ||
		    // or matches by type instance 		    	
		      (is_callable($listener['chemicalPattern']) && $chemical instanceof $listener['chemicalPattern']) ||
		    // or matched by chemical type only
		      $chemical === $listener['chemicalPattern']) {

		      // self remove from listeners if "once" has been invoked
		      if(isset($listener['once']) && $listener['once']) {		      	      	
		        unset($this->_listeners[$i]);	       
		        $i -= 1;
		      }

		      $chemicalRecieved = $listener['handle']($chemical, $callback);
		      
		      // in case plasma organelles received the chemical, further iterations are not allowed.
		      if($chemicalRecieved !== false)
		        return;
		    }
		}
	}

	function once(String $chemicalPattern, Callable $handler, $context=null) {		
		array_push($this->_listeners, 
			[	
				"chemicalPattern" => $chemicalPattern,
				"handle"=> $handler,
				"context"=> $context,
				"once"=> true
			]					
		);		
	}

	function on(String $chemicalPattern, Callable $handler, $context=null){		
		array_push( $this->_listeners,
			[	
				"chemicalPattern" => $chemicalPattern,
				"handle"=> $handler,
				"context"=> $context					
			]
		);		
	}

	function off(String $chemicalPattern, Callable $handler){
	  	for($i = 0; $i<count($this->_listeners); $i++) {
	    	$listener = $this->_listeners[$i];
	    	if($listener->chemicalPattern == $chemicalPattern && $listener->handle == $handler)
		    	unset($this->_listeners[$i]);
	  	}
	}

}

?>