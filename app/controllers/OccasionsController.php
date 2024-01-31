<?php

use MyApp\Controller;
use MyApp\Database;

/**
 * OccasionsController Class
 *
 * Represents the controller for the occasions-related functionality.
 */
class OccasionsController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        $sql = 'SELECT * FROM occasions';
        try {
            $this->db->query($sql);
            $occasions = $this->db->resultSet(PDO::FETCH_ASSOC);
            $data['occasions'] = $occasions;
            $data['cedric_ken_la_daronne_de_masis'] = $occasions;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $data['title'] = "Occasions";
        $this->template('header', $data);
        $this->view('occasions', $data);
        $this->template('footer');
    }
}