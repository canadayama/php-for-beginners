<?php

$_SESSION['name'] = 'Richard';

view("index.view.php", [
    'heading' => 'Home'
]);