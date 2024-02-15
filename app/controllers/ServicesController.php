<?php

use MyApp\Controller;
use MyApp\Database;

require_once 'FooterController.php';
require_once 'MessagesController.php';

class ServicesController extends Controller
{
    public function index()
    {
        try {
            $sql = 'SELECT * FROM prestations';
            $this->db->query($sql);
            $data['openTimes'] = FooterController::getOpeningHours();
            $data['prestations'] = $this->db->resultSet();
            $data['title'] = "Services";
            $this->template('header', $data);
            $this->view('services/services', $data);
            $this->template('footer', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }
    public static function getServices()
    {
        $db = new Database();
        $db->query("SELECT * FROM prestations");
        return $db->resultSet();
    }

    public function read()
    {
        try {
            $sql = 'SELECT * FROM prestations';
            $this->db->query($sql);

            $data['prestations'] = $this->db->resultSet();
            $data['title'] = "Services";
            $this->template('header', $data);
            $this->view('services/read', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function create()
    {
        try {
            $data['title'] = "Services";
            $this->template('header', $data);
            $this->view('/services/create', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function addServices()
    {
        try {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';

            if (empty($name) || empty($description) || empty($price) || empty($_FILES['photo']['name'])) {
                $this->redirect('/services/create', ['error' => 'Tous les champs sont obligatoires.']);
            }

            $photo = $_FILES['photo'];

            if ($photo['error'] !== UPLOAD_ERR_OK) {
                $this->redirect('/services/create', ['error' => 'Une erreur s\'est produite lors du téléchargement de la photo.']);
            }

            $photoData = file_get_contents($photo['tmp_name']);

            $this->db->query('INSERT INTO prestations (name, description, price, photo) VALUES (:name, :description, :price, :photo)');
            $this->db->bind(":name", $name);
            $this->db->bind(":description", $description);
            $this->db->bind(":price", $price);
            $this->db->bind(":photo", $photoData, PDO::PARAM_LOB);
            $this->db->execute();

            $this->redirect('/services/read');
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function update()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            $data['id'] = end($segment);

            $this->db->query("SELECT * FROM prestations WHERE id = :id");
            $this->db->bind(":id", $data['id']);
            $data['prestations'] = $this->db->single();

            $data['title'] = "Services";
            $this->template('header', $data);
            $this->view('/services/update', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function updateServices()
    {
        try {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $this->db->query("SELECT * FROM prestations WHERE id = :id");
            $this->db->bind(":id", $id);
            $isServiceExist = $this->db->single();
            if (!$isServiceExist) {
                return $this->redirect('/services/read');
            }

            $this->db->query("UPDATE prestations SET name = :name, description = :description, price = :price WHERE id = :id");
            $this->db->bind(":id", $id);
            $this->db->bind(":name", $name);
            $this->db->bind(":description", $description);
            $this->db->bind(":price", $price);
            $this->db->execute();

            $this->redirect('/services/read');
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            $data['id'] = end($segment);

            $this->db->query("SELECT * FROM prestations WHERE id = :id");
            $this->db->bind(":id", $data['id']);
            $data['prestations'] = $this->db->single();

            $data['title'] = "Services";
            $this->template('header', $data);
            $this->view('/services/delete', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function removeServices()
    {
        try {
            $id = $_POST['id'];
            $this->db->query("DELETE FROM prestations WHERE id = :id");

            $this->db->bind(":id", $id);
            $this->db->execute();

            $this->redirect('/services/read');
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    private function handleError(Throwable $e)
    {
        $data['error_message'] = "Une erreur s'est produite. Veuillez réessayer plus tard.";
        $this->view('404', $data);
        error_log("Erreur : " . $e->getMessage());
    }
}

