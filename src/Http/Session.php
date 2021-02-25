<?php

namespace Blog\Http;

class Session
{
    public static $attribut = 5;

    public static function has($key)
    {
        // if (isset($this->session['user'])) {
        //     return true;
        // }
        // return false;

        // écriture ternaire
        return isset($_SESSION[$key]) ? true : false;
    }

    public static function get($key)
    {
        // if (self::has($key)) {
        //     return $_SESSION[$key];
        // }

        return self::has($key) ? unserialize($_SESSION[$key]) : null;
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = serialize($value);
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }

    public static function getError($key)
    {
        if(self::has('errors')) {
            $errors = unserialize($_SESSION["errors"]);
            // return $errors[$key] ?? null;

            // if (isset($errors[$key])) {
            //     return $errors[$key];
            // }

            return isset($errors[$key]) ? $errors[$key] : null;
        }
    }

    public static function getOld($key)
    {
        if (self::has('old')) {
            $old = unserialize($_SESSION['old']);
            return $old[$key] ?? null;
        }
    }
}
