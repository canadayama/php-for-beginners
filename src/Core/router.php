<?php

use Core\Response;


/**
 * Undocumented function
 *
 * @param [type] $uri
 * @param [type] $routes
 * @return void
 */
function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

/**
 * Undocumented function
 *
 * @param [type] $code
 * @return void
 */
function abort($code = Response::NOT_FOUND) {
    http_response_code($code);

    view("{$code}.php");

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('routes.php');

routeToController($uri, $routes);
