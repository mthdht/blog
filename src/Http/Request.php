<?php

namespace Blog\Http;

// Classe représantant la requète de l'utilisateur
class Request
{
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function uri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public static function input($key)
    {
        if (self::has($key)) {
            return $_POST[$key];
        }
        throw new Exception("La clé $key n'éxiste pas !");
    }

    public static function has($key)
    {
        return isset($_POST[$key]) ? true : false;
    }

    public static function inputs()
    {
        return $_POST;
    }
}
