<?php

namespace Core\Middleware;

use Exception;

/**
 * Undocumented class
 */
class Middleware
{
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class,
    ];

    /**
     * Undocumented function
     *
     * @param [type] $key
     * @return void
     */
    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        (new $middleware)->handle();
    }
}