<?php

require_once 'api/iPlasma.php';

interface iOrganel{
	function __construct(iPlasma $plasma, array $config);
	//function dispose($chemical, $callback);
}

?>