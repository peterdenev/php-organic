<?php

class Organel{
	function __construct($plasma, $config, $parent){
	  $this->plasma = $plasma;
	  $this->config = $config;
	  $this->parent = $parent;
	}

	function emit($chemical, $callback=null){
	  require_once 'Chemical.php';
	  if(is_array($chemical)) $chemical = new Chemical($chemical);
	  $this->plasma->emit($chemical, $this, $callback);
	}

	function on($checmicalPattern, $handler){
	  $this->plasma->on($checmicalPattern, $handler, $this);
	}

	function once($checmicalPattern, $handler){
	  $this->plasma->once($checmicalPattern, $handler, $this);
	}

	function off($chemical, $callback){
	  $this->plasma->off($checmicalPattern, $handler, $this);
	}

}

?>