<?php
require_once 'api/iPlasma.php';

interface iNucleus{
	function __construct(iPlasma $plasma, $dna);
	function build($chemical, Callable $callback) : array;
}

?>