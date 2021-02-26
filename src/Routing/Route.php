<?php

namespace Blog\Routing;

use Blog\Http\Request;

class Route
{
    private $path;
    private $handler;
    private $matches = [];
    private $name;
    private $restrictions = [];

    public function __construct($path, $handler)
    {
        // validation des paramètres
        if (! is_string($path)) {
            throw new \Exception("the path must be a string");
        }
        if (! is_array($handler)) {
            throw new \Exception("the handler must be an array");
        }
        if (count($handler) !== 2) {
            throw new \Exception("only two element in the handler");
        }
        $this->path = $path;
        $this->handler = $handler;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getHandler()
    {
        return $this->handler;
    }

    public function getController()
    {
        return $this->handler[0];
    }

    public function getMethod()
    {
        return $this->handler[1];
    }

    public function handle()
    {
        $controllerName = "Blog\\Controllers\\" . $this->getController();
        $methodName = $this->getMethod();
        $controller = new $controllerName();
        // call_user_func([$controller, $methodName], ...$matches); // ["","",""] => "","",""
        call_user_func_array([$controller, $methodName], $this->matches); // ["","",""] => "","",""
        // $controller->$methodName(); // autre manière de faire
    }

    public function match()
    {
        $result = preg_match($this->pathRegex(), Request::uri(), $matches);
        array_shift($matches);
        $this->matches = $matches;

        return $result;
    }

    public function restrictionsRegex($captures)
    {
        // est ce que il y a une restritions pour $capture[1]
        if(isset($this->restrictions[$captures[1]])) {
            // return $restrictions
            return '(' . $this->restrictions[$captures[1]] . ')';
        }
        // return generique regex
        return '([^/]+)';
    }

    public function params(Array $restrictions) :self
    {
        // gerer les restriction des parametre de l'url
        $this->restrictions = str_replace('(', '(?:', $restrictions);

        return $this;
    }

    public function name(String $name) :self
    {
        // enregistrer un nom pour la route => redirection, création d'url
        $this->name = $name;
        return $this;
    }

    public function pathRegex()
    {
        return '#^'. preg_replace_callback('#\{([^/]+)\}#', [$this, 'restrictionsRegex'], $this->getPath()) . '$#';
    }
}
