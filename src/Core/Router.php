<?php

namespace Core;

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
            'method' => $method
        ];
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
        $this->add('GET', $uri, $controller);
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
        $this->add('POST', $uri, $controller);
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
        $this->add('DELETE', $uri, $controller);
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
        $this->add('PATCH', $uri, $controller);
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
        $this->add('PUT', $uri, $controller);
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
                return require base_path($route['controller']);
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