<?php
require_once './impl/Organel.php';
require_once './api/iPlasma.php';

class Organel_1 extends Organel{
	function __construct(iPlasma $plasma, array $config){
		
		parent::__construct($plasma, $config);

		if(isset($config['emit']) && $config['emit']){
			//$this->id = '2';
			$plasma->emit(['type'=>'test']);
		}else{
			//$this->id = '1';
			$plasma->on('test',function($chemical, $callback) use ($plasma){
				echo 'Yeeeaah!';
				$plasma->emit(['type'=>'o1_event', 'data'=>'Aloha']);
			});
		}		
	}

	// call via o1_event
	function customFuncName($chemical, $callback){
		//echo $this->id;
		echo ' TODO!!!';
		//return false; //uncomment me to continue chaining :)
	}

	// call via o1_event
	function otherCustomFuncName($chemical, $callback){
		//echo $this->id;
		echo ' TODOOOOO!!!';
		return false;
	}
}

?>