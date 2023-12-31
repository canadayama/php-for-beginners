<?php 

use Core\Session;
use Core\Response;


/**
 * Undocumented function
 *
 * @param [type] $value
 * @return void
 */
function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
};

/**
 * Undocumented function
 *
 * @param [type] $value
 * @return void
 */
function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
};

/**
 * Undocumented function
 *
 * @param integer $code
 * @return void
 */
function abort(int $code = 404)
{
    http_response_code($code);

    view("{$code}.php");
    die();
}

/**
 * Undocumented function
 *
 * @param [type] $condition
 * @param [type] $status
 * @return void
 */
function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

/**
 * Undocumented function
 *
 * @param string $path
 * @return string
 */
function base_path(string $path): string
{
    return BASE_PATH . $path;
}

/**
 * Undocumented function
 *
 * @param string $path
 * @param Array $attributes
 * @return void
 */
function view(string $path, $attributes = []): void
{
    extract($attributes);
    
    require base_path('views/' . $path);
}

/**
 * Undocumented function
 *
 * @param string $path
 * @return void
 */
function redirect(string $path): void
{
    header("location: {$path}");
    exit();
}

/**
 * Undocumented function
 *
 * @param string $key
 * @param string $default
 * @return string
 */
function old(string $key, string $default = ''): string
{
    return Session::get('old')[$key] ?? $default;
}