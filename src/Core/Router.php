<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;

/**
 * Undocumented class
 */
class Router {
    protected $routes =[];

    /**
     * Undocumented function
     *
     * @param [type] $method
     * @param [type] $uri
     * @param [type] $controller
     * @return void
     */
    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null,
        ];

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param [type] $uri
     * @param [type] $controller
     * @return void
     */
    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    /**
     * Undocumented function
     *
     * @param [type] $uri
     * @param [type] $controller
     * @return void
     */
    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    /**
     * Undocumented function
     *
     * @param [type] $uri
     * @param [type] $controller
     * @return void
     */
    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    /**
     * Undocumented function
     *
     * @param [type] $uri
     * @param [type] $controller
     * @return void
     */
    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    /**
     * Undocumented function
     *
     * @param [type] $uri
     * @param [type] $controller
     * @return void
     */
    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    /**
     * Undocumented function
     *
     * @param [type] $key
     * @return void
     */
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        
        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $uri
     * @param string $method
     * @return void
     */    
    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);
                
                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    /**
     * Undocumented function
     *
     * @param int $code
     * @return void
     */
    protected function abort(int $code = Response::NOT_FOUND): void
    {
        http_response_code($code);

        view("{$code}.php");
        die();
    }
}