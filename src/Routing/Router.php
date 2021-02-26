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

            if ($route->match()) {
                $route->handle();
            }
            // est ce que j'ai des parametres ? {erty}
            // $pathRegex = preg_replace('#\{[^/]+\}#', '([^/]+)', $route->getPath());

            // if(preg_match('#^' . $pathRegex . '$#', Request::uri(), $matches)) {
            //     // lancer l'action de la route 
            //     $controllerName = "Blog\\Controllers\\" . $route->getController();
            //     $methodName = $route->getMethod();
            //     $controller = new $controllerName();
            //     array_shift($matches);
            //     // call_user_func([$controller, $methodName], ...$matches); // ["","",""] => "","",""
            //     call_user_func_array([$controller, $methodName], $matches); // ["","",""] => "","",""

            //     // $controller->$methodName(); // autre manière de faire
            // }

            // TODO: 404 ?
        }
    }
}
