<?php

class Cell{
	function __construct($dna, $core=null) {

		$dcore = array('Plasma','Nucleus','Membrane');
		foreach($dcore as $dcore_class_name){
			if(!class_exists($dcore_class_name))
				require ($dcore_class_name.'.php');
		}

		if(!isset($this->plasma)) 
		    $this->plasma = new Plasma();
		  
		$nucleus = new Nucleus($dna, $this->plasma);
		  
		$this->membrane = new Membrane($nucleus, $this->plasma);
		$this->organelles = $nucleus->createNamespace("plasma", $this);
		
	}

}

?>