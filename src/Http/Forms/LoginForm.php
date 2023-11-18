<?php

namespace Http\Forms;

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
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function validate(string $email, string $password): bool
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please enter a valid email address.';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Please enter a valid password.';
        }

        return empty($this->errors);
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
     * @return void
     */
    public function error(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }
}