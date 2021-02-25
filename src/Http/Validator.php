<?php

namespace Blog\Http;

class Validator {
    // attributs (Etat)
    // error []
    private $errors = [];

    public function getErrors()
    {
        return $this->errors;
    }

    // methodes (Comportement)

    public function validate($array)
    {
        foreach ($array as $field => $rules) {
            foreach ($rules as $rule => $value) {
                if (is_int($rule)) {
                    $this->$value($field);
                } else {
                    $this->$rule($field, $value);
                }
            }
        }
        $_SESSION["errors"] = $this->errors;
    }

    public function hasErrors()
    {
        if ($this->errors) {
            return true;
        }
        return false;
    }

    // methodes pour chaque verification
    // vide ?
    // min (nb) ?
    // max (nb) ?
    // alpha ?
    // numeric ?
    // alphadashnum ?
    // email ?
    // telephone ?
    // confirmation ?
    // url

    public function required($key)
    {
       
        if (empty($_POST[$key])) {
            $this->errors[$key] = "Le champs est requis";
        }
    }
    
    public function min($key, $nb)
    {
        if (!empty($_POST[$key])) {
            if (strlen($_POST[$key]) < $nb) {
                $this->errors[$key] = "Le champs doit avoir au moins " . $nb . " caractères";
            }
        }
    }
    
    public function max($key, $nb)
    {
        if (!empty($_POST[$key])) {
            if (!strlen($_POST[$key]) < $nb) {
                $this->errors[$key] = "Le champs doit avoir au maximum " . $nb . " caractères";
            }
        }
    }
    
    public function alpha($key)
    {
        if (!empty($_POST[$key])) {
            if (!preg_match("#^[a-zA-Z]+$#", $_POST[$key])) {
                $this->errors[$key] = "Uniquement des lettres";
            }
        }  
    }

    public function numeric($key)
    {
        if (!empty($_POST[$key])) {
            if (!preg_match("#^[0-9]+$#", $_POST[$key])) { 
                $this->errors[$key] = "Uniquement des Chiffres";
            }
        }
    }

    public function alphaNumDash($key)
    {
        if (!empty($_POST[$key])) {
            if (!preg_match("#^[a-zA-Z0-9_-]+$#", $_POST[$key])) {
                $this->errors[$key] = "Uniquement des chiffres, lettres et tirets";
            }
        }
    }

    public function email($key)
    {
        if (!empty($_POST[$key])) {
            // if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$#", $_POST[$key])) {
            //     $this->errors[$key] = "email non valide";
            //     $_SESSION[$key] = $this->errors[$key];
            // }

            if (!filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)) {
                $this->errors[$key] = "email non valide";
            }
        }
    }

    public function telephone($key)
    {
        if (!empty($_POST[$key])) {
            if (!preg_match("#^0[67]([ .-]?[0-9]{2}){4}$#", $_POST[$key])) {// 0611223344 06 11 22 33 44 06-11-22-33-44
                $this->errors[$key] = "telephone non valide";
            }
        }
    }

    public function confirmation($key)
    {
        if (!empty($_POST[$key])) {
            // $_POST[$key]  == $_POST[$key . '-confirm']
            if ($_POST[$key] !== $_POST[$key . '-confirm']) {
                $this->errors[$key] = "Les champs " . $key . " et " . $key . "-confirmation ne correspondent pas!";
            }
        }
    }

    public function url($key)
    {
        if (!empty($_POST[$key])) {
            if (!filter_var($_POST[$key], FILTER_VALIDATE_URL)) {
                $this->errors[$key] = "url non valide";
            }
        }
    }
}