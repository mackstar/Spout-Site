<?php

$appDir = dirname(dirname(dirname(__DIR__)));

return [
    'tmp_dir' => dirname(__DIR__),
    'app_name' => "Mackstar\Spout\App",
    'resource_dir' => dirname(__DIR__),
    'lib_dir' => $appDir . '/lib',
    'log_dir' => $appDir . '/var/log',
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