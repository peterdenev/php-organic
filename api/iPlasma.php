<?php

interface iPlasma{
	
	function emit($chemical, Callable $callback=null);

	function once(String $chemicalPattern, Callable $handler, $context=null);

	function on(String $chemicalPattern, Callable $handler, $context=null);

	function off(String $chemicalPattern, Callable $handler);

}

?>