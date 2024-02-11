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
        $this->router->addRoute('occasions', 'OccasionsController@index');
        $this->router->addRoute('services', 'ServicesController@index');
        $this->router->addRoute('login', 'LoginController@index');
        $this->router->addRoute('admin', 'AdminController@index');
        $this->router->addRoute('user', 'UserController@index');
        
        $this->router->addRoute('notices/read', 'NoticesController@read');
        $this->router->addRoute('notices/create', 'NoticesController@create');
        $this->router->addRoute('notices/create/add', 'NoticesController@addNotices');
        $this->router->addRoute('notices/delete/#id', 'NoticesController@delete');
        $this->router->addRoute('notices/delete/action', 'NoticesController@removeNotices');
        $this->router->addRoute('notices/validate/#id', 'NoticesController@validate');
        $this->router->addRoute('notices/validate/action', 'NoticesController@validateNotices');

        $this->router->addRoute('occasions/read', 'OccasionsController@read');
        $this->router->addRoute('occasions/create', 'OccasionsController@create');
        $this->router->addRoute('occasions/create/add', 'OccasionsController@addOccasions');
        $this->router->addRoute('occasions/delete/#id', 'OccasionsController@delete');
        $this->router->addRoute('occasions/update/#id', 'OccasionsController@update');
        $this->router->addRoute('occasions/update/action', 'OccasionsController@updateOccasions');
        $this->router->addRoute('occasions/delete/action', 'OccasionsController@removeOccasions');

        $this->router->addRoute('services/read', 'ServicesController@read');
        $this->router->addRoute('services/create', 'ServicesController@create');
        $this->router->addRoute('services/create/add', 'ServicesController@addServices');
        $this->router->addRoute('services/delete/#id', 'ServicesController@delete');
        $this->router->addRoute('services/delete/action', 'ServicesController@removeServices');
        $this->router->addRoute('services/update/#id', 'ServicesController@update');
        $this->router->addRoute('services/update/action', 'ServicesController@updateServices');

        $this->router->addRoute('openTimes/read', 'OpenTimesController@read');
        $this->router->addRoute('openTimes/update/#id', 'OpenTimesController@update');
        $this->router->addRoute('openTimes/update/action', 'OpenTimesController@updateOpenTimes');

        $this->router->addRoute('employed/read', 'EmployedController@read');
        $this->router->addRoute('employed/create', 'EmployedController@create');
        $this->router->addRoute('employed/create/add', 'EmployedController@addEmployed');
        $this->router->addRoute('employed/delete/#id', 'EmployedController@delete');
        $this->router->addRoute('employed/update/#id', 'EmployedController@update');
        $this->router->addRoute('employed/delete/action', 'EmployedController@removeEmployed');
        $this->router->addRoute('employed/update/action', 'EmployedController@updateEmployed');

        $this->router->addRoute('messages/read', 'MessagesController@read');
        $this->router->addRoute('messages/add', 'MessagesController@addMessages');
        $this->router->addRoute('messages/delete/#id', 'MessagesController@delete');
        $this->router->addRoute('messages/delete/action', 'MessagesController@removeMessages');

        $this->router->addRoute('login/auth', 'LoginController@authenticate');
        $this->router->addRoute('logout', 'LogoutController');
    }

    /**
     * Run l'application.
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
