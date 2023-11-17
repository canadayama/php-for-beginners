<?php

namespace Core;


/**
 * Container class
 */
class Container
{
    protected $bindings = [];

    /**
     * Undocumented function
     *
     * @param string $key
     * @param callable $resolver
     * @return void
     */
    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }


    /**
     * Undocumented function
     *
     * @param string $key
     * @return
     */
    public function resolve(string $key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for {$key}");
        }

        return call_user_func($this->bindings[$key]);
    }
}