<?php

use MyApp\Controller;
use MyApp\Router;

class App {
    protected $router;

    public function __construct() {
        $this->initRouter();
    }

    protected function initRouter() {
        $this->router = new Router();
        $this->defineRoutes();
    }

    protected function defineRoutes() {
        $this->router->addRoute('', 'HomeController@index');
        $this->router->addRoute('home', 'HomeController@index');
        $this->router->addRoute('login', 'LoginController@index');
        $this->router->addRoute('admin', 'AdminController@index');
        $this->router->addRoute('user', 'UserController@index');
        $this->router->addRoute('services', 'ServicesController@index');
        $this->router->addRoute('occasions', 'OccasionsController@index');

        $this->router->addRoute('occasionsCrud/read', 'OccasionsCrudController@index');
        $this->router->addRoute('occasionsCrud/create', 'OccasionsCrudController@create');

        $this->router->addRoute('servicesCrud/read', 'ServicesCrudController@index');
        $this->router->addRoute('servicesCrud/create', 'ServicesCrudController@create');
        $this->router->addRoute('servicesCrud/create/add', 'ServicesCrudController@addServices');

        $this->router->addRoute('openTimesCrud/read', 'OpenTimesCrudController@index');
        $this->router->addRoute('openTimesCrud/update', 'OpenTimesCrudController@update');

        $this->router->addRoute('employedCrud/read', 'EmployedCrudController@index');
        $this->router->addRoute('employedCrud/create', 'EmployedCrudController@create');
        $this->router->addRoute('employedCrud/create/add', 'EmployedCrudController@addEmployed');

        $this->router->addRoute('employedCrud/update/{id}', 'EmployedCrudController@update');
        $this->router->addRoute('delete/{id}', 'EmployedCrudController@delete');

        $this->router->addRoute('login/auth', 'LoginController@authenticate');


    }

    /**
     * Runs the application.
     */
    public function run() {

        $path = trim($_SERVER['REQUEST_URI'], '/');
        $controllerAction = $this->router->route($path);

        if ($controllerAction) {
            list($controllerName, $action) = explode('@', $controllerAction);
            require_once '../app/controllers/' . ucfirst($controllerName) . '.php';

            $controllerClassName = ucfirst($controllerName);
            $controllerInstance = new $controllerClassName();

            $controllerInstance->$action();
        } else {
            $this->handle404();
        }
    }

    /**
     * Handles 404 errors.
     */
    protected function handle404() {
        $controller = new Controller();
        $controller->view('404');
    }
}
