<?php

/**
 * Welcome to the Mackstar.Spout Project
 *
 * Place your custom routes here!
 * Below are examples of possible routes..
 * Routes are assigned to an app name.
 *
 * GET /api/resources/index
 * POST /api/resources/types
 * GET /blog/the-name-of-the-post
 * GET /photo-gallery/photo-gallery-name
 * GET /photo-gallery/photo-gallery-name
 * GET /my-custom-route
 */

$routes->add('mackstar', [
    ['home', '/', 'index'],
    ['blog', '/blog', 'blog/index'],
    ['blog-detail', '/blog/{slug}', 'blog/detail', ['tokens' => ['slug' => '[^/]+']]],
    ['page', '/pages/{slug}', 'index', ['tokens' => ['slug' => '[^/]+']]]
]);