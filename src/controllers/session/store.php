<?php

use Core\App;
use Core\Database;
use Core\Validator;


$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please enter a valid password.';
}

if (!empty($errors)) {
    return view('sessions/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /');
        exit();
    }
}

return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);
