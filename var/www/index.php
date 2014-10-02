<?php

//use Mackstar\Spout\Bootstrap;

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
if (preg_match('/\.(?:png|jpg|jpeg|gif|js|css|html|woff|svg|ico)$/', strtolower($_SERVER["REQUEST_URI"]))) {
    return false;
}

$app = require dirname(dirname(__DIR__)) . '/var/bootstrap/run.php';

function castToArray($obj)
{
    if (is_object($obj)) {
        $obj = (array) $obj;
    }
    if (is_array($obj)) {
        $new = array();
        foreach ($obj as $key => $val) {
            $new[$key] = castToArray($val);
        }
    } else {
        $new = $obj;
    }
    return $new;
}

/**
 * Calling the match of a BEAR.Sunday compatible router will give us the 
 * $method, $pagePath, $query to be used
 * in the page request.
 */


list($method, $pagePath, $spoutApp, $query) = $app->router->match();

if ( $method !== 'get' && $rawdata = file_get_contents('php://input')) {
    $rawdata = castToArray(json_decode($rawdata));
    if (!empty($rawdata)) {
        $query += $rawdata;
    }
}


if (is_null($pagePath)) {
    $code = 404;
    goto ERROR;
}


/**
 * An attempt to request the page resource is made.
 * Upon failure the appropriate error code is assigned and forwarded to ERROR.
 */

try {
    $scheme = (in_array('api', $context))? 'app://' : 'page://';
    $path = $scheme . $spoutApp . '/' . $pagePath;

    $app->page = $app->resource->$method->uri($path)
        ->withQuery($query)->eager->request();
} catch (NotFound $e) {
    $code = 404;
    goto ERROR;
} catch (MethodNotAllowed $e) {
    $code = 405;
    goto ERROR;
} catch (BadRequest $e) {
    var_dump('eek');
    $code = 400;
    goto ERROR;
} catch (Exception $e) {
    $code = 503;
    error_log((string)$e);
    goto ERROR;
}

/**
 * OK: Sets the response resources and renders
 * ERROR: sets the response code and loads error page.
 */
OK: {
    $app->response->setResource($app->page)->render()->send();
    exit(0);
}

ERROR: {
    http_response_code($code);
    try {
        switch ($code) {
            case '404':
                echo $app->resource->get->uri('page://pz/fourofour')->eager->request();
                break;
            default:
                echo $app->resource->get->uri('page://pz/fivehundred')->eager->request();
        }
    } catch (Exception $e) {
        echo $code;
    }

    exit(1);
}