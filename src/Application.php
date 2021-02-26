<?php

namespace Blog;

use Blog\Routing\Router;

class Application 
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();

        // Initialise le gestionnaire d'erreurs
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
        // Appel le fichier rempli de fonctions utiles
        require_once '../src/helpers.php';
    }


    public function run()
    {
        // definitions des routes
        // TODO: Exporter le fichier
        $this->router->get('/admin',['HomeController', 'homeAdmin']);
        $this->router->get('/profile',['HomeController', 'profile']);

        $this->router->get('/login', ['AuthController', 'showLogin'])->name('login');
        $this->router->post('/login', ['AuthController', 'login']);
        
        $this->router->get('/register', ['AuthController', 'showRegister']);
        $this->router->post('/register', ['AuthController', 'register']);
        
        $this->router->get('/logout', ['AuthController', 'logout']);

        // route avec parametres
        $this->router->get('/articles/{article}', ['AuthController', 'showArticle'])->params(["article" => "([0-9]+)([a-z]+)"])->name('showArticle'); // Test

        $this->router->get('/articles/{article}/commentaires/{comment}', ['AuthController', 'showArticle'])->params(["article" => "([0-9]+)([a-z]+)"])->name('showArticle');;
        // executer le router
        $this->router->run();
    }


}