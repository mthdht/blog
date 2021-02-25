<?php

// création de la session
session_start();

// autoloading
require_once '../vendor/autoload.php';

// Constante vers le dossier des vues
define('VIEWS', '../src/Views/');

// instance de l'application
$app = new Blog\Application();

$app->run();

unset($_SESSION['errors']);