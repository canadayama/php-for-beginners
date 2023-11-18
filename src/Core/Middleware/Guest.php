<?php

namespace Core\Middleware;


/**
 * Undocumented class
 */
class Guest
{
    public function handle()
    {
        if (isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}