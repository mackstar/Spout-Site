<?php

/**
 * Welcome to the Mackstar.Spout Project
 *
 * Place your custom routes here!
 *
 * These are implemented by the Aura Router details can be 
 * found at: https://github.com/auraphp/Aura.Router
 *  
 */
$routes = $app->router->get();

$routes->add('bobscars',[
    ['home', '/', 'index']
    ['cardetail', '/cardetail/read/{id}', 'cars/detail']

]);