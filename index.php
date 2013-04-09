<?php
require 'lib/Cell.php';

$cell = new Cell(
	array(
		'plasma'=>array(
			'organal_1'=> array(
				'source' => 'Organel_1'
			),						
			'organel_2'=> array(
				'source' => 'Organel_1',
				'emit'=>true			
			)
		)
	)
);


?>