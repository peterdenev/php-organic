<?php

interface iPlasma{
	
	function emit($chemical, $callback=null);

	function once($chemicalPattern, $handler, $context=null);

	function on($chemicalPattern, $handler, $context=null);

	function off($chemicalPattern, $handler);

}

?>