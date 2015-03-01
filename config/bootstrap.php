<?php
class_alias("\Rita\Core\Cache\Cache",'Cache', true);
class_alias("\Rita\Core\Utility\Rita",'Rita', true);


use \Cake\Routing\Router;
/**
 *  cache config
 */
Cache::config('rita', [

            'className' => 'File',
            'prefix' => 'rita_core_',
            'path' => CACHE . 'persistent/',
            'serialize' => true,
            'duration' => '+2 minutes',

    ]);
    
/**
 * menu Admin
 */

       
$menu =  RitaMenu::menu('Admin.left');    


$menu
->addMenu('dashboard',[
    'title' => __d('Core','داشبورد'),
    'icon' => 'icon-homealt',
    'url' => '/admin'
])
->addMenu('service',[
    'title' => __d('Core','سرویس‌ها'),
    'url' => '/admin/services/'
]);
$menu->addMenu('service.users',[
    'title' => __d('users','???????'),
    'url' => '/admin/services/'
]);

$menu->addChild('service',[

    'title' => __d('Core','SDFSDSDG'),
    'url' => '/admin/services/'

]);
//->addMenu('service.www.users',[
//
//    'title' => __d('Core','aaa'),
//    'url' => '/admin/services/'
//
//])
//->addMenu('service.users.system',[
//
//    'title' => __d('Core','aaa'),
//    'url' => '/admin/services/'
//
//])
//->addChild('service.users',[
//
//    'title' => __d('Core','SDFSDSDG'),
//    'url' => '/admin/services/'
//
//]);


