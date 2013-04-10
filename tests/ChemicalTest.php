<?php
require_once '../lib/Chemical.php';

class ChemicalTest extends PHPUnit_Framework_TestCase{
	//public $basic_instance;

	public function setUp(){
		//$this->basic_instance = new Chemical();			
	}

	public function test_simple_instance(){
		$c = new Chemical();	
		$this->assertTrue(gettype($c)=='object');
	}

	public function test_type_data_instance(){
		$c = new Chemical('value', array("prop"=>"v"));		
		$this->assertEquals('value', $c->type);		
		$this->assertEquals("v", $c->data['prop']);						
	}

	public function test_json_string_data_instance(){
		$c = new Chemical('{"type": "value", "data": {"prop": "v"}}');	
		$this->assertEquals('value', $c->type);
		$this->assertEquals("v", $c->data['prop']);
	}

	public function test_assoc_arr_data_instance(){
		$c = new Chemical( array("type"=>"value",
								 "data"=>array("prop"=>"v")) );	
		$this->assertEquals('value', $c->type);
		$this->assertEquals("v", $c->data['prop']);
	} 

}

?>