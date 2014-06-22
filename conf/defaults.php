<?php

/**
 * Welcome to the Mackstar.Spout Project
 *
 * This is where the main configuration is added.
 * You can override this per environment in 
 * /conf/env/{env}.php
 *  
 */
$appDir = dirname(__DIR__);

return [
    'tmp_dir' => dirname(__DIR__) . '/var/tmp',
    'resource_dir' => dirname(__DIR__),
    'lib_dir' => $appDir . '/lib',
    'log_dir' => $appDir . '/var/log',
    'template_dir' => $appDir . '/lib/twig/template',
    'master_db' => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'spout',
        'user' => 'root',
        'password' => '',
        'charset' => 'UTF8'
    ],
    'slave_db' => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'spout',
        'user' => 'root',
        'password' => '',
        'charset' => 'UTF8'
    ],

];