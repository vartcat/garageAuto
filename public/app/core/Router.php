<?php

namespace MyApp;

class Router {
    /**
     * @var array $routes Associative array to store routes, where the key is the URI
     *                   and the value is an array containing the controller and method.
     */
    protected $routes = [];

    /**
     * Add a new route to the router.
     *
     * @param string $uri The URI pattern to match.
     * @param string $controller The controller and method associated with the route (format: Controller@method).
     * @param string $method The HTTP request method associated with the route (default is 'GET').
     */
    public function addRoute($uri, $controller, $method = 'GET') {
        $this->routes[$uri] = ['controller' => $controller, 'method' => $method];
    }

    /**
     * Find and return the controller associated with a given URI and HTTP method.
     *
     * @param string $uri The URI to route.
     * @param string $method The HTTP request method (default is 'GET').
     *
     * @return string|null The controller and method associated with the URI, or null if not found.
     */
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
