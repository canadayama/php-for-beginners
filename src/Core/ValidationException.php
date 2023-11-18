<?php

namespace Core;


/**
 * Undocumented class
 */
class ValidationException extends \Exception
{
    public readonly array $errors;
    public readonly array $old;

    /**
     * Undocumented function
     *
     * @param array $errors
     * @param array $old
     * @return void
     */
    public static function throw(array $errors, array $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }


    public function errors()
    {
        return $this->errors;
    }
}