<?php 

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
 * @param [type] $condition
 * @param [type] $status
 * @return void
 */
function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}