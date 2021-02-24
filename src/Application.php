<?php

namespace Blog;

use Blog\Routing\Router;

class Application 
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();
    }


    public function run()
    {
        
        // definitions des routes
        $this->router->get('/',['HomeController', 'home']);
        $this->router->get('/contact',['HomeController', 'showContact']);

        $this->router->post('/contact',['HomeController', 'HandleContact']);

        $this->router->get('/login', ['AuthController', 'showLogin']);
        $this->router->post('/login', ['AuthController', 'login']);
        
        $this->router->get('/register', ['AuthController', 'showRegister']);
        $this->router->post('/register', ['AuthController', 'register']);

        
        // executer le router
        $this->router->run();
    }
}