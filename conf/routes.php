<?php

/**
 * Welcome to the Mackstar.Spout Project
 *
 * Place your custom routes here!
 *
 * Spout routes are implemented by the aura
 * 
 * 
 */
$routes = $app->router->get();

$routes->add('bobscars',[
    ['cardetail', '/cardetail/read/{id}', 'cars/detail']

]);