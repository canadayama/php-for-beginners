<?php

$config = require('config.php');
$db = new Database($config['database'], 'phptut', 'secret');

$heading = 'My Notes';

$notes = $db->query('SELECT * FROM notes WHERE user_id = 2')->findAll();

require "views/notes/index.view.php";