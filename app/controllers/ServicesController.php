<?php

use MyApp\Controller;

require_once 'FooterController.php';

class ServicesController extends Controller
{
    /**
     * Display the index page.
     */
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
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $this->db->query("SELECT * FROM prestations WHERE name = :name");
        $this->db->bind(":name", $name);
        $isPrestationsAlreadyExist = $this->db->single();

        if ($isPrestationsAlreadyExist) {
            return $this->redirect('/services/create');
        }

        $this->db->query('INSERT INTO prestations (name, description, price) VALUES (:name, :description, :price)');

        // Insert new record into the contacts table
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->bind(":price", $price);

        $this->db->execute();
        $this->redirect('/services/read');
    }
}
