<?php

use MyApp\Controller;

class OccasionsCrudController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        $sql = 'SELECT * FROM voitures';
        try {
            $this->db->query($sql);
            $occasions = $this->db->resultSet(PDO::FETCH_ASSOC);
            $data['occasions'] = $occasions;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $data['title'] = "OccasionsCrud";
        $this->template('header', $data);
        $this->view('/occasionCrud/read', $data);
        $this->template('footer');
    }
}