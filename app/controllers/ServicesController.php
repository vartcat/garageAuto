<?php

use MyApp\Controller;
use MyApp\Database;

require_once 'FooterController.php';
require_once 'MessagesController.php';

class ServicesController extends Controller
{
    public function index()
    {
        $sql = 'SELECT * FROM prestations';
        $this->db->query($sql);
        $data['openTimes'] = FooterController::getOpeningHours();
        $data['prestations'] = $this->db->resultSet();
        $data['title'] = "Services";
        $this->template('header', $data);
        $this->view('services/services', $data);
        $this->template('footer', $data);
    }

    public static function getServices()
    {
        $db = new Database();
        $db->query("SELECT * FROM prestations");
        return $db->resultSet();
    }

    public function read()
    {
        $sql = 'SELECT * FROM prestations';
        $this->db->query($sql);

        $data['prestations'] = $this->db->resultSet();
        $data['title'] = "Services";
        $this->template('header', $data);
        $this->view('services/read', $data);
    }

    public function create()
    {
        $data['title'] = "Services";
        $this->template('header', $data);
        $this->view('/services/create', $data);
    }

    public function addServices()
    {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? '';

        // Vérifier si les champs obligatoires sont vides
        if (empty($name) || empty($description) || empty($price) || empty($_FILES['photo']['name'])) {
            // Redirection vers le formulaire avec un message d'erreur
            $this->redirect('/services/create', ['error' => 'Tous les champs sont obligatoires.']);
        }

        // Récupérer les informations sur le fichier téléchargé
        $photo = $_FILES['photo'];

        // Vérifier s'il y a une erreur lors du téléchargement
        if ($photo['error'] !== UPLOAD_ERR_OK) {
            // Redirection vers le formulaire avec un message d'erreur
            $this->redirect('/services/create', ['error' => 'Une erreur s\'est produite lors du téléchargement de la photo.']);
        }

        // Lire le contenu du fichier téléchargé
        $photoData = file_get_contents($photo['tmp_name']);

        // Insérer le nouveau service dans la base de données avec les données de l'image
        $this->db->query('INSERT INTO prestations (name, description, price, photo) VALUES (:name, :description, :price, :photo)');
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->bind(":price", $price);
        $this->db->bind(":photo", $photoData, PDO::PARAM_LOB); // Enregistrer le contenu de l'image
        $this->db->execute();

        // Redirection vers la page de lecture des services
        $this->redirect('/services/read');
    }


    public function update()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);

        $this->db->query("SELECT * FROM prestations WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['prestations'] = $this->db->single();

        $data['title'] = "Services";
        $this->template('header', $data);
        $this->view('/services/update', $data);
    }
    public function updateServices()
    {
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
    }

    public function delete()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);

        $this->db->query("SELECT * FROM prestations WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['prestations'] = $this->db->single();

        $data['title'] = "Services";
        $this->template('header', $data);
        $this->view('/services/delete', $data);
    }
    public function removeServices()
    {
        $id = $_POST['id'];
        $this->db->query("DELETE FROM prestations WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->execute();

        $this->redirect('/services/read');
    }
}
