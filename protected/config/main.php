<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Házi és gyermekorvosok',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'generate',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
                'application.gii',   // a path alias
            ),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true,
			'loginUrl'=>array('admin/login'),
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'	=> true, //false,
			'rules'=>array(
				'gii'										=>	'gii',
			//	'<id:\d+>'									=>  '',
			//	'<name:\d+>'								=>  '',
			// index.php-ban kerül megadásra	''											=>	'/1/content/home',
				'admin/content/delete/id/<id:\d+>'			=>	'admin/content/delete',
				'admin/'									=>	'admin/admin/index',
				'admin/login'								=>	'admin/authentication/login',
		//		'admin/logout'								=>	'admin/authentication/logout',
				'admin/user/'								=>	'admin/admin/index',
				'admin/huzen/<uzen:\w+>'					=>	'admin/admin/huzen',
				'<controller:\w+>/<id:\d+>'					=>	'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'	=>	'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'				=>	'<controller>/<action>',
				'<name:\w+>'								=>	'content/index',
			//	'<name:\d+>'								=>  'content/index'
			),
		),  // */ 
		'db'=>require(dirname(__FILE__) . '/db_prod.php'),
		'errorHandler'=>array(
			'errorAction'=>'content/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				/*array(
					'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					//'levels'=>'error, warning',
					'ipFilters'=>array('127.0.0.1'),
				),*/
				// uncomment the following to show log messages on web pages
				/* 
				array(
					'class'=>'CWebLogRoute',
				),
			/*	*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'dg@ddstandard.hu',
		'orvos'=> $GLOBALS['file1'],
		'orvos_old'=>'',
		'cont_name'=>'',
	),
);