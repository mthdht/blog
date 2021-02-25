<?php

namespace Blog\Controllers;

use Blog\Http\Session;
use Blog\Http\Request;
use Blog\Http\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        $this->view('showLogin', 'layout');
    }

    public function login()
    {
        // Validation du form
        $validator = new Validator();
        $validator->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ], Request::inputs());

        // vérification erreurs ?
        if ($validator->hasErrors()) {
            // enregistre en session
            Session::set('errors', $validator->getErrors());
            Session::set('old', Request::inputs());
            // redirige
            $this->redirect('/login');
        }   

        // verifier que l'utilisateur existe avec bonne données
        $manager = new \Blog\Models\UserManager();
        // user avec meme email
        $user = $manager->getForLogin(Request::input('email')); // tableau avec les donnée, soit false
        
        if($user) {
            // verifier que les mot de passe sont égaux
            if (password_verify(Request::input('password'), $user->getPassword('password'))) {
                Session::set('user', $user);
                $this->redirect('/profile');
            }
        }
        // erreur en session
        Session::set('errors', ["fail" => "Les identifiants ne vont pas !"]);
        // redirige
        $this->redirect('/login');
    }

    public function showRegister()
    {
        $this->view('showRegister', 'layout');
    }

    public function register()
    {
        // valider le formulaire
        $validator = new Validator();
        $validator->validate([
            "pseudo" => ['required','alphaNumDash', "min" => 2],
            "email" => ["required", "email"],
            "password" => ["required"]
        ], Request::inputs());

        // erreurs ?
        if ($validator->hasErrors()) {
            // enregistre en session
            Session::set('errors', $validator->getErrors());
            // redirige
            $this->redirect('/register');
        }
        
        // enregistrement en bdd
        $user = new \Blog\Models\User(Request::inputs());
        $manager = new \Blog\Models\UserManager();

        // Vérifie si l'utilisateur existe déja en base de donnée
        if ($manager->exists(Request::input('email'))) {
            Session::set('errors', ["email" => "L'utilisateur existe déja !"]);
            // redirige
            $this->redirect('/register');
        }
        $manager->save($user);
        // TODO: message positif en session

        // Connexion de l'utilisateur en session
        Session::set('user', $user);

        $this->redirect('/profile');
    }

    public function logout()
    {
        Session::delete('user');
        header('Location: /');
        exit();
    }
}
