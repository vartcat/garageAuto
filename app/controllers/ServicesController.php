<?php

use MyApp\Controller;
use MyApp\Database;

/**
 * ServicesController Class
 *
 * Represents the controller for the services-related functionality.
 */
class ServicesController extends Controller
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
            $data['cedric_ken_la_daronne_de_masis'] = $prestations;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $data['title'] = "Services";
        $this->template('header', $data);
        $this->view('services', $data);
        $this->template('footer');
    }
}
