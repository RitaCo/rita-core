<?php

$config = [
	'assets' => [
	
		'admin' => [
		
			'Rita.req.css'
		]
	],

//	
//	'Cache' => [
//	
//	
//		'rita' => [
//			'className' => 'File',
//			'prefix' => 'rita_core_',
//			'path' => CACHE . 'persistent/',
//			'serialize' => true,
//			'duration' => '+2 minutes',
//		],
//	]

];
use Cake\Core\Configure;
Configure::write($config);


