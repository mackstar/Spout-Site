<?php

$confDir = dirname(dirname(__DIR__)) . '/conf';
$map = [
    'dbname' => 'name',
    'password' => 'pass',
    'driver' => 'adapter' 
];
$defaults = require $confDir . '/defaults.php';

$contexts = scandir($confDir . '/contexts');
foreach($contexts as $key => &$file) {
    if (substr($file, 0, 1) == '.') {
        unset($contexts[$key]);
        continue;
    }

    $context      = substr($file, 0, -4);
    $contextConf  = $defaults;
    $contextConf += (require $confDir . '/contexts/' . $file);
    foreach ($contextConf['master_db'] as $key => $value) {
        if (isset($map[$key])) {
            $dbConf[$context][$map[$key]] = $value;
        } else {
            $dbConf[$context][$key] = $value;
        }
    }
    $dbConf[$context]['adapter'] = str_replace('pdo_', '', $dbConf[$context]['adapter']);
}

$migrationConf = [

    'paths' => [
        'migrations' => 'lib/migrations'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'dev',
    ]
];

$migrationConf['environments'] += $dbConf;

return $migrationConf;