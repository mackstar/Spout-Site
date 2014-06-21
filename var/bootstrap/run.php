<?php

namespace Mackstar\Spout;


use \BEAR\Package\Bootstrap\Bootstrap;

$appDir = dirname(dirname(__DIR__));
$loader = require $appDir . '/vendor/autoload.php';

Bootstrap::registerLoader(
    $loader,
    __NAMESPACE__,
    dirname(__DIR__)
);

return Bootstrap::getApp(
    'Mackstar\Spout\App',
    isset($context) ? $context : 'production',
    dirname(__DIR__) . '/var/tmp'
);
