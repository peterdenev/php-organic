<?php
require 'api/iNucleus.php';
require 'DNA.php';
require 'Chemical.php';

class Nucleus implements iNucleus{
		
	function __construct($plasma, $dna){
	  $this->dna = $dna instanceof DNA ? $dna : new DNA($dna);	  
	  $this->plasma = $plasma;	  
	}


	function build($chemical, $callback=null){	
	  $result = array();	  
	  $chemical = $chemical instanceof Chemical ? $chemical : new Chemical($chemical);
	  if(!isset($chemical->branch))
	      throw new Exception("can not build object without branch with chemical ".print_r($chemical, true));
	  $branch_raw = $chemical->branch;
	  $branch = $this->dna->$branch_raw;
	  if($branch) {
	    foreach($branch as $objectId=>$objectVal) {
	      $objectConfig = $objectVal;
	      if(!$objectConfig['source'])
	        throw new Exception("can not create object without source at ".$namespace." ".print_r($objectConfig, true));
	      $source = $objectConfig['source'];
	      if(strpos($source, ".") !== false && strpos($source, "/") === false)
	        $source = str_replace('.','/',$source);
	      //if(strpos($source, "/") !== 0)
	      //  $source = getcwd()+"/"+$source;	    
	      require_once($source.'.php');	      
	      $path_parts = pathinfo($source);
		  $organelClass = $path_parts['filename'];
	      $instance = new $organelClass($this->plasma, $objectConfig);
	      array_push($result, $instance);      
	     
	    }
	  }
	  if ($callback) $callback($result);
	  return $result;
	}
}

?>