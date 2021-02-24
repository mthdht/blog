<?php

// création de la session
session_start();

function dump($a)
{
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}

// autoloading
require_once '../vendor/autoload.php';

// Constante vers le dossier des vues
define('VIEWS', '../src/Views/');

// instance de l'application
$app = new Blog\Application();

$app->run();