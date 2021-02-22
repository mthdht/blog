<?php

namespace Blog\Routing; 

class Router
{
    private $routes = [
        "GET" => [],
        "POST" => []
    ];


    public function get($path, $handler)
    {
        // creer une route
        $route = new Route($path, $handler);
        // enregistrer cette route dans le tableau de route
        $this->routes["GET"][] = $route;
    }

    public function post($path, $handler)
    {
        // creer une route
        $route = new Route($path, $handler);
        // enregistrer cette route dans le tableau de route
        $this->routes["POST"][] = $route;
    }
    
    public function run()
    {
        // dump($this->routes);
        // comparer l'url entrée par l'utilisateur avec tout les chemin de mes routes
        foreach ($this->routes[$_SERVER["REQUEST_METHOD"]] as $route) {
            if($_SERVER["REQUEST_URI"] == $route->getPath()) {
                // lancer l'action de la route 
                $controllerName = "Blog\\Controllers\\" . $route->getController();
                $methodName = $route->getMethod();
                $controller = new $controllerName();
                
                call_user_func([$controller, $methodName]);
                // $controller->$methodName();

            };
        }
    }
}
