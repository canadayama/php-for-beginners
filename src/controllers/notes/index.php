<?php

$config = require base_path('config.php');
$db = new Database($config['database'], 'phptut', 'secret');

$notes = $db->query('SELECT * FROM notes WHERE user_id = 2')->findAll();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);