<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please enter a password between 7 and 255 characters.';
}

if ($password !== $password_confirm) {
    $errors['password_confirm'] = 'Passwords do not match!.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$result = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($result) {
    $errors['email'] = 'Email already registered!';
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
    //header('location: /');
    //exit();
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    (new Authenticator)->login([
        'email' => $email
    ]);

    header('location: /');
    exit();
}