<?php

use MyApp\Controller;
use MyApp\Router;

class App
{
    protected $router;

    public function __construct()
    {
        $this->initRouter();
    }

    protected function initRouter()
    {
        $this->router = new Router();
        $this->defineRoutes();
    }

    protected function defineRoutes()
    {
        // Routes pour les contrôleurs principaux
        $this->addRoute('home', 'HomeController@index');
        $this->addRoute('occasions', 'OccasionsController@index');
        $this->addRoute('services', 'ServicesController@index');
        $this->addRoute('login', 'LoginController@index');
        $this->addRoute('admin', 'AdminController@index');
        $this->addRoute('user', 'UserController@index');

        // Routes pour les annonces
        $this->addRoute('notices/read', 'NoticesController@read');
        $this->addRoute('notices/create', 'NoticesController@create');
        $this->addRoute('notices/create/add', 'NoticesController@addNotices');
        $this->addRoute('notices/delete/#id', 'NoticesController@delete');
        $this->addRoute('notices/delete/action', 'NoticesController@removeNotices');
        $this->addRoute('notices/validate/#id', 'NoticesController@validate');
        $this->addRoute('notices/validate/action', 'NoticesController@validateNotices');

        // Routes pour les occasions
        $this->addRoute('occasions/read', 'OccasionsController@read');
        $this->addRoute('occasions/create', 'OccasionsController@create');
        $this->addRoute('occasions/create/add', 'OccasionsController@addOccasions');
        $this->addRoute('occasions/delete/#id', 'OccasionsController@delete');
        $this->addRoute('occasions/update/#id', 'OccasionsController@update');
        $this->addRoute('occasions/update/action', 'OccasionsController@updateOccasions');
        $this->addRoute('occasions/delete/action', 'OccasionsController@removeOccasions');

        // Routes pour les services
        $this->addRoute('services/read', 'ServicesController@read');
        $this->addRoute('services/create', 'ServicesController@create');
        $this->addRoute('services/create/add', 'ServicesController@addServices');
        $this->addRoute('services/delete/#id', 'ServicesController@delete');
        $this->addRoute('services/delete/action', 'ServicesController@removeServices');
        $this->addRoute('services/update/#id', 'ServicesController@update');
        $this->addRoute('services/update/action', 'ServicesController@updateServices');

        // Routes pour les horaires
        $this->addRoute('openTimes/read', 'OpenTimesController@read');
        $this->addRoute('openTimes/update/#id', 'OpenTimesController@update');
        $this->addRoute('openTimes/update/action', 'OpenTimesController@updateOpenTimes');

        // Routes pour les employés
        $this->addRoute('employed/read', 'EmployedController@read');
        $this->addRoute('employed/create', 'EmployedController@create');
        $this->addRoute('employed/create/add', 'EmployedController@addEmployed');
        $this->addRoute('employed/delete/#id', 'EmployedController@delete');
        $this->addRoute('employed/update/#id', 'EmployedController@update');
        $this->addRoute('employed/delete/action', 'EmployedController@removeEmployed');
        $this->addRoute('employed/update/action', 'EmployedController@updateEmployed');

        // Routes pour les messages
        $this->addRoute('messages/read', 'MessagesController@read');
        $this->addRoute('messages/add', 'MessagesController@addMessages');
        $this->addRoute('messages/delete/#id', 'MessagesController@delete');
        $this->addRoute('messages/delete/action', 'MessagesController@removeMessages');

        // Authentification
        $this->addRoute('login/auth', 'LoginController@authenticate');

        // Logout
        $this->addRoute('logout', 'LogoutController@index');
        $this->addRoute('logout/logout', 'LogoutController@logout');
    }

    private function addRoute($path, $controller_action)
    {
        $this->router->addRoute($path, $controller_action);
    }
    /**
     * Run l'application.
     */
    public function run()
    {

        $path = trim($_SERVER['REQUEST_URI'], '/') ?: 'home';
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
    protected function handle404()
    {
        $controller = new Controller();
        $controller->view('404');
    }
}
