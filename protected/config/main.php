<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name' => 'Joey Simsen',

	// preloading 'log' component
	'preload'=>array('log'),//, 'bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.admin.models.*',
	),

	'modules'=>array(
		'admin',
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'test',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
		    	'bootstrap.gii'
		    ),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => array('admin/default/login'),
		),
		'clientScript' => array(
// 			'coreScriptPosition' => CClientScript::POS_END,
// 			'class' => 'application.vendors.NLSClientScript',
// 			'compressMergedJs' => true, //def:false
// 			'compressMergedCss' => true, //def:false
// 			'appVersion' => 1.0, //if set, it will be appended to the urls of the merged scripts/css
			'scriptMap' => array(
				'jquery.js' => 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
			),
			'packages'=>array(
				'bbq'=>array(
					'depends'=>array('browser'),
				),
				'browser'=>array(
					'basePath' => 'application.vendors',
					'js' => array('jquery.browser.min.js'),
				),
			),
		),
		'bootstrap' => array(
		    'class' => 'ext.yiibooster.components.Bootstrap',
		    'responsiveCss' => true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				''=>'content/view/1',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'admin'=>'admin/defaultContent/admin',
			),
			'showScriptName' => false,
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=joeysimsen_com',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);