<?php

namespace Blog;

use Blog\Routing\Router;
use Blog\Controllers\HomeController;

class Application 
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();
    }


    public function run()
    {
        // actions
        // router
            // run(request)
                // appeler un controller + methode de ce controller

        $this->router->get('/',[HomeController::class, 'home']);
        $this->router->get('/contact',[HomeController::class, 'showContact']);

        $this->router->post('/contact',[HomeController::class, 'HandleContact']);
        
        // executer le router
        $this->router->run();
    }
}