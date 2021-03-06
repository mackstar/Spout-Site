<?php
/**
 * Carries out all of the main bootrap actions for your app.
 * This file may be freely edited.
 */
use \Mackstar\Spout\Bootstrap\Bootstrap;

ini_set('xdebug.max_nesting_level', 1000);

$appDir = dirname(dirname(__DIR__));
$tmpDir = $appDir . '/var/tmp';

$loader = require $appDir . '/vendor/autoload.php';
$apps = require $appDir . '/conf/apps.php';

/**
 * Logic to set what context to set your app to.
 * In this case we set `dev/production` based on SERVER_ADDR,
 * and set `api`
 */
$context = (
    (isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR'] == '127.0.0.1') ||
    $_SERVER['SERVER_NAME'] == 'localhost'

)? ['dev'] : ['prod'];
if (strpos($_SERVER['REQUEST_URI'], '/api') === 0) {
    $context[] = 'api';
}

/**
 * Clear cache - remove in Production.
 */
//if (in_array('dev', $context)) {
    Bootstrap::clearApp([$tmpDir]);
//}

/**
 * Additional Classloading
 *
 * You should only need this for local apps as other apps should
 * have already been loaded via composer.
 */
Bootstrap::registerLoader($loader, $apps, $appDir);
//(new \Ray\Di\Locator())->setLogger(new \Ray\Di\CompilationLogger(new \Ray\Di\Logger()));
/**
 * Returns the `Mackstar Spout`, `BEAR.Sunday` app.
 */
$app = Bootstrap::getApp($apps, $context, $tmpDir);
$routes = $app->router->get();
require $appDir . '/conf/routes.php';

return $app;