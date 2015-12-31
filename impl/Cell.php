<?php

require_once 'api/iCell.php';
require_once 'Plasma.php';
require_once 'Nucleus.php';

class Cell implements iCell{
	function __construct($dna) {	
		
		$this->plasma = new Plasma();
		  
		$nucleus = new Nucleus($this->plasma, $dna);		  
		
		$this->organelles = $nucleus->build(['type'=>'plasma', 'branch'=>'organelles']);
		
	}

}

?>