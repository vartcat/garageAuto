<?php

namespace MyApp;

use Throwable;
use MyApp\Database;

require_once './app/core/Storage.php';

class Controller
{
    /**
     * @var Database The database instance.
     */
    protected $db;
    /**
     * @var Storage The storage instance.
     */
    protected $storage;

    public function __construct()
    {
        $this->db = new Database;
        $this->storage = new Storage;
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
        $modelFile = './app/models/' . $model . '.php';
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $model($this->db, $this->storage);
        }
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

    protected function handleError(Throwable $e, $message = "Une erreur s'est produite. Veuillez réessayer plus tard.")
    {
        $data['error_message'] = $message;
        $this->view('/errors/error', $data);
        error_log("Erreur : " . $e->getMessage());
    }
}
