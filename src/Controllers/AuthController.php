<?php

namespace Blog\Controllers;

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
        if ($manager->exists($_POST["email"])) {
            echo 'l\'utilisateur existe deja';
            return;
        }

        // le connecter (session)
        $user = $manager->getByEmail($_POST["email"]);
        $_SESSION["user"] = serialize($user);

        // rediriger vers une page
    }

    public function showRegister()
    {
        require VIEWS . 'showRegister.php';
    }

    public function register()
    {
        // valid

        // enregistrement en bdd
        $user = new \Blog\Models\User($_POST);

        $manager = new \Blog\Models\UserManager();
        $manager->save($user);

        header('Location: /');
        exit();
    }
}
