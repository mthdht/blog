<?php
namespace Blog\Controllers;

class Controller
{
    protected function redirect($path)
    {
        header('Location: '. $path);
        exit();
    }

    protected function view($view, $layout)
    {
        ob_start();
        require VIEWS . $view . '.php';
        $content = ob_get_clean();
        require VIEWS . $layout . '.php';
    }
}