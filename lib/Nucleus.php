<?php
require ('DNA.php');

class Nucleus{
		
	function __construct($dna, $plasma){
	  $this->dna = $dna instanceof DNA ? $dna : new DNA($dna);
	  $this->organellesMap = array();
	  $this->plasma = $plasma;
	  $this->organelles = $this->createNamespace("nucleus", $this);
	}

	function createNamespace($namespace, $parent){
	  $result = array();
	  $branch = $this->dna->selectBranch($namespace);
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
	      //console.log(source, OrganelClass);
	      $path_parts = pathinfo($source);
		  $organelClass = $path_parts['filename'];
	      $instance = new $organelClass($this->plasma, $objectConfig, $parent);
	      array_push($result, $instance);
	      
	      $address = (isset($objectConfig['address'])) ? $objectConfig['address'] : ($namespace . $objectId);
	      $this->organellesMap['address'] = array("instance"=>$instance);
	    }
	  }
	  return $result;
	}
}

?>