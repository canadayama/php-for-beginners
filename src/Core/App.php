<?php

namespace Core;

/**
 * Undocumented class
 */
class App
{
    protected static Container $container;

    /**
     * Sets the continer.
     *
     * @param Container $container
     * @return void
     */
    public static function setContainer(Container $container): void
    {
        static::$container = $container;
    }

    /**
     * Returns the set container.
     *
     * @return Container
     */
    public static function container(): Container
    {
        return static::$container;
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @param callable $resolver
     * @return void
     */
    public static function bind(string $key, callable $resolver): void
    {
        static::container()->bind($key, $resolver);
    }

    /**
     * Undocumented function
     *
     * @param string $key
     * @return mixed
     */
    public static function resolve(string $key): mixed
    {
        return static::container()->resolve($key);
    }
}