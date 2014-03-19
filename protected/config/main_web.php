<?php
return CMap::mergeArray(include('main.php'), array(

	// application components
	'components'=>array(
		'db' => array(
 			'connectionString' => 'mysql:host=joeysimsen.com.mysql;dbname=joeysimsen_com',
			'emulatePrepare' => true,
 			'username' => 'joeysimsen_com',
			'password' => 'hKT8dHX4',
			'charset' => 'utf8',
		),
	),
));