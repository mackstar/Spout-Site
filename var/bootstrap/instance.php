<?php

/**
 * Application instance script
 *
 * @return $app \BEAR\Sunday\Extension\Application\AppInterface
 * @global $context string configuration mode
 */
namespace Mackstar\Spout\App;

use BEAR\Package\Bootstrap\Bootstrap;

require_once __DIR__ . '/autoload.php';

$app = Bootstrap::getApp(
    __NAMESPACE__,
    isset($context) ? $context : 'prod',
    dirname(__DIR__) . '/var/tmp'
);

return $app;