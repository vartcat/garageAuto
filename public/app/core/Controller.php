<?php

namespace MyApp;

class Controller
{
    /**
     * @var Database The database instance.
     */
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * view.
     *
     * @param string $viewName The name of the view file to render.
     * @param array $data (Optional) Data to be passed to the view.
     */
    public function view($viewName, $data = [])
    {
        $viewFile = "./app/views/" . $viewName . ".php";

        if (file_exists($viewFile)) {
            extract($data);
            require_once $viewFile;
        } else {
            echo "Error: view file not found";
        }
    }

    /**
     * template.
     * @param string $viewName The name of the template file to render.
     * @param array $data (Optional) Data to be passed to the template.
     */
    public function template($viewName, $data = [])
    {
        $viewFile = "./app/views/templates/" . $viewName . ".php";

        if (file_exists($viewFile)) {
            extract($data);
            require_once $viewFile;
        } else {
            echo "Error: template file not found";
        }
    }

    /**
     * model.
     * @param string $model The name of the model to load.
     * @return object An instance of the specified model.
     */
    public function model($model)
    {
        require_once './app/Models/' . $model . '.php';
        return new $model($this->db);
    }

    /**
     * URL.
     * @param string $url The URL to redirect to.
     */
    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}
