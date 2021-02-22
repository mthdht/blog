<?php

namespace Blog\Routing;

class Route
{
    private $path;
    private $handler;

    public function __construct($path, $handler)
    {
        // $path = string
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
        // $handler = array
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
}
