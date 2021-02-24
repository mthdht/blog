<?php

namespace Blog\Controllers;

use Blog\Http\Session;
use Blog\Http\Request;

class AuthController
{
    public function showLogin()
    {
        require VIEWS . 'showLogin.php';
    }

    public function login()
    {
        // verifier que l'utilisateur existe avec bonne données
        $manager = new \Blog\Models\UserManager();
    
        // user avec meme email et mdp
        $user = $manager->getForLogin(Request::input('email'), Request::input('password')); // tableau avec les donnée, soit false

        if($user) {
            Session::set('user', $user);
            header("Location: profile");
            exit();
        }
        // erreur en session
        // redirige
    }

    public function showRegister()
    {
        require VIEWS . 'showRegister.php';
    }

    public function register()
    {
        // TODO: valider le formulaire

        // enregistrement en bdd
        $user = new \Blog\Models\User($_POST);

        $manager = new \Blog\Models\UserManager();

        // Vérifie si l'utilisateur existe déja en base de donnée
        if ($manager->exists(Request::input('email'))) {
            // TODO: Rediriger avec les erreurs
            echo 'l\'utilisateur existe deja';
            return;
        }
        $manager->save($user);
        // TODO: message positif en session

        // Connexion de l'utilisateur en session
        Session::set('user', $user);

        header('Location: /profile');
        exit();
    }

    public function logout()
    {
        Session::delete('user');
        header('Location: /');
        exit();
    }
}
