<?php
use Cake\Routing\Router;

Router::prefix('admin',function($routes){

	$routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index','plugin'=>'Rita']);


	
});

Router::scope('/client',['section' => 'clients'],function($routes)
{
     	$routes->connect('/',['plugin' => 'Rita', 'controller' => 'Clients','action' => 'client']);
    
    
});