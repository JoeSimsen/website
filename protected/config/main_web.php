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
		'clientScript' => array(
			'coreScriptPosition' => CClientScript::POS_END,
			'class' => 'application.vendors.NLSClientScript',
			'compressMergedJs' => true, //def:false
			'compressMergedCss' => true, //def:false
			'appVersion' => 1.0, //if set, it will be appended to the urls of the merged scripts/css
		),
	),
));