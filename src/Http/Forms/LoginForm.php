<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;


/**
 * Undocumented class
 */
class LoginForm
{
    protected $errors = [];

    /**
     * Undocumented function
     *
     * @param array $attributes
     */
    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please enter a valid email address.';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please enter a valid password.';
        }
    }

    /**
     * Undocumented function
     *
     * @param string $email
     * @param string $password
     * @return 
     */
    public static function validate(Array $attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function failed(): bool
    {
        return (bool) count($this->errors);
    }
    /**
     * Undocumented function
     *
     * @return Array
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Undocumented function
     *
     * @param string $field
     * @param string $message
     * @return LoginForm
     */
    public function error(string $field, string $message): LoginForm
    {
        $this->errors[$field] = $message;

        return $this;
    }
}