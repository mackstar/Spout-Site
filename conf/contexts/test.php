<?php

/**
 * Welcome to the Mackstar.Spout Project
 *
 * This is where you can override the default configuration.
 * for the *TEST* context. 
 */

return [
    'master_db' => [
        'driver' => 'pdo_sqlite',
        'dbname' => dirname(dirname(__DIR__)) . '/vendor/mackstar/spout/tests/test_db',
        'path' => __DIR__ . '/test_db.sqlite3', // sets DB location to root path
        'charset' => 'UTF8'
    ],
    'slave_db' => [
        'driver' => 'pdo_sqlite',
        'dbname' => 'test_db',
        'path' => __DIR__ . '/test_db.sqlite3', // sets DB location to root path
        'charset' => 'UTF8'
    ]
];