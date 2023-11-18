<?php

namespace Core\Middleware;


/**
 * Undocumented class
 */
class Auth
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}