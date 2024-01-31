<?php

use MyApp\Controller;

class ServicesCrudController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        $sql = 'SELECT * FROM prestations';
        try {
            $this->db->query($sql);
            $prestations = $this->db->resultSet(PDO::FETCH_ASSOC);
            $data['prestations'] = $prestations;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $data['title'] = "ServicesCrud";
        $this->template('header', $data);
        $this->view('/servicesCrud/read', $data);
        $this->template('footer');
    }
    public function create()
    {
        $data['title'] = "ServicesCrud";
        $this->template('header', $data);
        $this->view('/servicesCrud/create', $data);
        $this->template('footer');
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
            return $this->redirect('/servicesCrud/create');
        }

        $this->db->query('INSERT INTO prestations (name, description, price) VALUES (:name, :description, :price)');

        // Insert new record into the contacts table
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->bind(":price", $price);

        $this->db->execute();

        $this->redirect('/servicesCrud/read');
    }
}