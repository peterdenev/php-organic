<?php

require 'api/iOrganel.php';

abstract class Organel implements iOrganel{
	function __construct($plasma, $config){
		$this->plasma = $plasma;
		$this->config = $config;
		$that = &$this;
		
	  	if(isset($config['onMapping']) && !empty($config['onMapping'])){	  		
	  		foreach($config['onMapping'] as $external_on=>$internal_on){	  			
			  	$this->plasma->on($external_on, function($chemical, $callback=null) use ($that,$internal_on){
				  	return $that->$internal_on($chemical, $callback);
				}, $this);
			}
		}

	  
	}

	
}

?>