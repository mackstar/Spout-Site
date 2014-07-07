<?php

/**
 * Welcome to the Mackstar.Spout Project
 *
 * Place your custom routes here!
 * Below are examples of possible routes..
 *
 * GET /api/resources/index
 * POST /api/resources/types
 * GET /blog/the-name-of-the-post
 * GET /photo-gallery/photo-gallery-name
 * GET /photo-gallery/photo-gallery-name
 * GET /my-custom-route
 */
 //$routes = //$app->router->get();

$app->router->add('bobscars', [
    ['home', '/', 'index'],
    ['cardetail', '/cardetail/{id}', 'cars/detail']
    ['car_resource', '/api/cardetail/{slug}', 'resources/detail', [
            'tokens' => ['slug' => '[^/]+']
            'values' => ['type' => 'cars']
        ]
    ]
]);

// $routes->add('spout', [
//     ['bobs-admin', '/bobsadmin', 'spoutadmin'],
// ]);