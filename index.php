<?php
require 'impl/Cell.php';

$cell = new Cell(
	array(
		'organelles'=>array(
			'organal_1'=> array(
				'source' => 'Organel_1',
				'onMapping' =>array(
					'o1_event' => 'customFuncName'
					)				
			),						
			'organel_2'=> array(
				'source' => 'Organel_1',
				'emit'=>true,
				'onMapping' =>array(
					'o1_event' => 'otherCustomFuncName'
					)			
			)
		)
	)
);


?>