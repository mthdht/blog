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
        
        // route pour articles
        $this->router->get('/articles', ['ArticleController', 'index']);
        $this->router->get('/articles/nouveau', ['ArticleController', 'create']);
        $this->router->post('/articles/nouveau', ['ArticleController', 'store']);
        $this->router->get('/articles/{slug}', ['ArticleController', 'show']);
        $this->router->post('/articles/{slug}', ['ArticleController', 'destroy']);
        $this->router->get('/articles/{slug}/edit', ['ArticleController', 'edit']);
        $this->router->post('/articles/{slug}/edit', ['ArticleController', 'update']);
        
        
        
        
        
        // executer le router
        $this->router->run();
    }


}