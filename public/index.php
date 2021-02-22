<?php

function dump($a)
{
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}

// autoloading
require_once '../vendor/autoload.php';


$app = new Blog\Application();

$app->run();