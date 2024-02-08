<?php

use MyApp\Controller;
use MyApp\Database;

class NoticesController extends Controller
{
    public static function getNotices()
    {
        $db = new Database();
        $db->query("SELECT * FROM avis");
        return $db->resultSet();
    }
    public function read()
    {
        $sql = 'SELECT * FROM avis';
        $this->db->query($sql);

        $data['notices'] = $this->db->resultSet();
        $data['notice'] = $this->db->single();
        $data['title'] = "Notices";
        $this->template('header', $data);
        $this->view('notices/read', $data);
    }

    public function create()
    {
        $data['title'] = "Notices";
        $this->template('header', $data);
        $this->view('/notices/create', $data);
    }

    public function addNotices()
    {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $avis = $_POST['avis'];

        $this->db->query('INSERT INTO avis (name, lastname, email, avis) VALUES (:name, :lastname, :email, :avis)');

        // Insert new record into the contacts table
        $this->db->bind(":name", $name);
        $this->db->bind(":lastname", $lastname);
        $this->db->bind(":email", $email);
        $this->db->bind(":avis", $avis);

        $this->db->execute();

        $this->redirect('/notices/read');
    }
}
