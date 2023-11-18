<?php

namespace Core;

use Core\App;


/**
 * Undocumented class
 */
class Authenticator
{
    /**
     * Undocumented function
     *
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function attempt(string $email, string $password): bool
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email
                ]);
        
                return true;
            }
        }

        return false;
    }

    /**
 * Undocumented function
 *
 * @param Array $user
 * @return void
 */
public function login(Array $user): void
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

/**
 * Undocumented function
 *
 * @return void
 */
public function logout(): void
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
}