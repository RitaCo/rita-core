<?php


use Cake\Cache\Cache;

Cache::config('rita', [

            'className' => 'File',
            'prefix' => 'rita_core_',
            'path' => CACHE . 'persistent/',
            'serialize' => true,
            'duration' => '+2 minutes',

    ]);
