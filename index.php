<?php
require 'impl/Cell.php';

$cell = new Cell([
	'organelles'=>[
		'organal_1'=> [
			'source' => 'Organel_1',
			'onMapping' =>[
				'o1_event' => 'customFuncName'
			]
		],
		'organel_2'=> [
			'source' => 'Organel_1',
			'emit'=>true,
			'onMapping' =>[
				'o1_event' => 'otherCustomFuncName'
			]
		]
	]
]);


?>