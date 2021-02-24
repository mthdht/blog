<?php

namespace Blog\Controllers;

use Blog\Models\ContactManager;

class HomeController
{
    public function home()
    {
        echo "page d'accueil";
    }

    public function profile()
    {
        if (\Blog\Http\Session::has('user')) {
            require VIEWS . 'profile.php';
        } else {
            header('Location: /');
        }
    }

    public function showContact()
    {
        require VIEWS . 'showContact.php';
    }

    public function handleContact()
    {
        $contact = new \Blog\Models\Contact($_POST);

        // manager -> enregistrer l'objet
        $contactManager = new ContactManager();

        $contactManager->save($contact);

        header('Location: /contact');
        exit();
    }
}
