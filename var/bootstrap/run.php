<?php

use \BEAR\Package\Bootstrap\Bootstrap;

$appDir = dirname(dirname(__DIR__));
$loader = require $appDir . '/vendor/autoload.php';

Bootstrap::registerLoader(
    $loader,
    __NAMESPACE__,
    dirname(__DIR__)
);

