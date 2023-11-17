<?php

$config = require base_path('config.php');
$db = new Database($config['database'], 'phptut', 'secret');

$currentUserId = 2;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);