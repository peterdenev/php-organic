<?php
require_once './lib/Organel.php';
require_once './lib/Chemical.php';

class Organel_1 extends Organel{
	function __construct($plasma, $config, $parent){
		parent::__construct($plasma, $config, $parent);
		if(isset($config['emit'])){
			$this->emit(array('type'=>'test'));
		}else{
			$plasma->on('test',function(){
				echo 'Yeee again';
			});
		}		
	}
}

?>