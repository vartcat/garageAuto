<?php
namespace MyApp;
use Throwable;
use MyApp\Database;
require_once './app/core/Storage.php';
class Controller
{
    protected $db;
    protected $storage;
    public function __construct()
    {
        $this->db = new Database;
        $this->storage = new Storage;
    }
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
    public function model($model)
    {
        $modelFile = './app/models/' . $model . '.php';
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $model($this->db, $this->storage);
        }
    }
    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
    protected function handleError(Throwable $e, $message = "Une erreur s'est produite. 
    Veuillez réessayer plus tard.")
    {
        $data['error_message'] = $message;
        $this->view('/errors/error', $data);
        error_log("Erreur : " . $e->getMessage());
    }
}
