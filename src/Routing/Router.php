<?php

namespace Blog\Routing; 

use \Blog\Http\Request;

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
        foreach ($this->routes[Request::method()] as $route) {
            // TODO: Gérer les paramètres
            if(Request::uri() == $route->getPath()) {
                // lancer l'action de la route 
                $controllerName = "Blog\\Controllers\\" . $route->getController();
                $methodName = $route->getMethod();
                $controller = new $controllerName();
                
                call_user_func([$controller, $methodName]);
                // $controller->$methodName(); // autre manière de faire
            };
        }
    }
}
