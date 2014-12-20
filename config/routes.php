<?php
use Cake\Routing\Router;
//Router::plugin('Admin', function ($routes) {
//	$routes->fallbacks();
//});
Router::prefix('admin',function($routes){

	$routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index','plugin'=>'Rita']);


	
});

