<?php

namespace MyApp;

class Router {
   
    protected $routes = [];

    public function addRoute($uri, $controller, $method = 'GET') {
        $this->routes[$uri] = ['controller' => $controller, 'method' => $method];
    }

    public function route($uri, $method = 'GET') {
        $matchRoute = $this->getRegexRoute($uri);
        if ($matchRoute && $this->routes[$matchRoute]['method'] == $method) {
            return $this->routes[$matchRoute]['controller'];
        }
        return null;
    }

    protected function getRegexRoute($uri) {
        foreach($this->routes as $path => $route) {
            if ($this->matchRoute($path, $uri)) {
              return $path;
            }
        }
        return false;
    }

    protected function matchRoute($route, $uri) {
        $pattern = str_replace('/', '\/', str_replace('#id', '\d+', $route));
        $pattern = '/^' . $pattern . '$/';
        return preg_match($pattern, trim($uri));
    }
}
