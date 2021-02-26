<?php

namespace Blog\Controllers;

use Blog\Models\ContactManager;

class HomeController extends Controller
{
    public function home()
    {
        echo "page d'accueil";

        //
    }

    public function profile()
    {
        if (\Blog\Http\Session::has('user')) {
            $this->view('profile', 'layoutAdmin');
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

    public function homeAdmin()
    {
        $this->view('homeAdmin', 'layoutAdmin');
    }
}
