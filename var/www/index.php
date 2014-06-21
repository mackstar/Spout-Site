<?php

use Mackstar\Spout\Bootstrap;

/**
 * Welcome to the Mackstar.Spout Project
 *
 * This is the main entry point for the spout application.
 * It will be recieving requests such as the following
 * 
 * GET /api/resources/index
 * POST /api/resources/types
 * GET /blog/the-name-of-the-post
 * GET /photo-gallery/photo-gallery-name
 * GET /photo-gallery/photo-gallery-name
 * GET /my-custom-route
 */
$appDir = dirname(dirname(__DIR__));
$app = require $appDir . '/bootstrap/instance.php';


