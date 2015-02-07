<?php
use Cake\Routing\Router;

Router::prefix('admin', function($routes){

    $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'welcome','plugin'=>'Rita']);


    
});

Router::prefix('client', function($routes){

    $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'welcome','plugin'=>'Rita']);


    
});

