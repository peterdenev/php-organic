<?php

require 'api/iCell.php';
require 'Plasma.php';
require 'Nucleus.php';

class Cell implements iCell{
	function __construct($dna) {	
		
		$this->plasma = new Plasma();
		  
		$nucleus = new Nucleus($this->plasma, $dna);		  
		
		$this->organelles = $nucleus->build(array('type'=>'plasma', 'branch'=>'organelles'));
		
	}

}

?>