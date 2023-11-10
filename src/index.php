<?php

require 'functions.php';
//require 'router.php';

// Connect to MySQL database.
$dsn = "mysql:host=172.16.79.39;port=3306;dbname=php_tut;user=phptut;password=secret;charset=utf8mb4";
$pdo = new PDO($dsn);

$statement = $pdo->prepare('SELECT * FROM posts');
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo '<li>' . $post['title'] . '</li>';
}