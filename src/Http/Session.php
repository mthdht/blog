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
        return isset($_SESSION['user']) ? true : false;
    }

    public static function get($key)
    {
        // if ($this->has($key)) {
        //     return $this->session[$key];
        // }

        return self::has($key) ? unserialize($_SESSION[$key]) : '';
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = serialize($value);
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }
}
