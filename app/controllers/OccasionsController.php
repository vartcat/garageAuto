<?php

use MyApp\Controller;

require_once 'FooterController.php';

class OccasionsController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        $sql = 'SELECT * FROM occasions';
        $this->db->query($sql);

        $data['openTimes'] = FooterController::getOpeningHours();
        $data['occasions'] = $this->db->resultSet();
        $data['title'] = "Occasions";
        $this->template('header', $data);
        $this->view('occasions/occasions', $data);
        $this->template('footer', $data);
    }

    public function read()
    {
        $sql = 'SELECT * FROM occasions';
        $this->db->query($sql);

        $data['occasions'] = $this->db->resultSet();
        $data['title'] = "OccasionsCrud";
        $this->template('header', $data);
        $this->view('/occasions/read', $data);
    }


    public function create()
    {
        $data['title'] = "OccasionsCrud";
        $this->template('header', $data);
        $this->view('occasions/create', $data);
    }

    public function addOccasions()
    {
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];
        $description = $_POST['description'];
        $carburant = $_POST['carburant'];
        $kilometre = $_POST['kilometre'];
        $prix = $_POST['prix'];

        $this->db->query('INSERT INTO occasions (modele, annee, description, carburant, kilometre, prix) VALUES (:modele, :annee, :description, :carburant, :kilometre, :prix)');

        // Insert new record into the contacts table
        $this->db->bind(":modele", $modele);
        $this->db->bind(":annee", $annee);
        $this->db->bind(":description", $description);
        $this->db->bind(":carburant", $carburant);
        $this->db->bind(":kilometre", $kilometre);
        $this->db->bind(":prix", $prix);

        $this->db->execute();

        $this->redirect('/occasions/read');
    }

    public function delete()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);
        
        $this->db->query("SELECT * FROM occasions WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['occasions'] = $this->db->single();
        
        $data['title'] = "Occasions";
        $this->template('header', $data);
        $this->view('/occasions/delete', $data);
    }

    public function removeOccasions()
    {
        $id = $_POST['id'];
        $this->db->query("DELETE FROM occasions WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->execute();

        $this->redirect('/occasions/read');
    }

    public function update()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);

        $this->db->query("SELECT * FROM occasions WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['occasions'] = $this->db->single();

        $data['title'] = "Occasions";
        $this->template('header', $data);
        $this->view('/occasions/update', $data);
    }
    public function updateOccasions()
    {
        $id = $_POST['id'];
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];
        $description = $_POST['description'];
        $carburant = $_POST['carburant'];
        $kilometre = $_POST['kilometre'];
        $prix = $_POST['prix'];

        $this->db->query("SELECT * FROM occasions WHERE id = :id");
        $this->db->bind(":id", $id);
        $isOccasionExist = $this->db->single();
        if (!$isOccasionExist) {
            return $this->redirect('/occasions/read');
        }

        $this->db->query("UPDATE occasions SET modele = :modele, annee = :annee, description = :description, carburant = :carburant, kilometre = :kilometre, prix = :prix WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->bind(":modele", $modele);
        $this->db->bind(":annee", $annee);
        $this->db->bind(":description", $description);
        $this->db->bind(":carburant", $carburant);
        $this->db->bind(":kilometre", $kilometre);
        $this->db->bind(":prix", $prix);

        $this->db->execute();

        $this->redirect('/occasions/read');
    }
}
