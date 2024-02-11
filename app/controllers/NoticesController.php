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
        $name = htmlspecialchars($_POST['name']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $avis = htmlspecialchars($_POST['avis']);
        $status = "standing";
        $note = htmlspecialchars($_POST['note']);

        $this->db->query('INSERT INTO avis (name, lastname, email, avis, status, note) VALUES (:name, :lastname, :email, :avis, :status, :note)');

        // Insert new record into the contacts table
        $this->db->bind(":name", $name);
        $this->db->bind(":lastname", $lastname);
        $this->db->bind(":email", $email);
        $this->db->bind(":avis", $avis);
        $this->db->bind(":status", $status);
        $this->db->bind(":note", $note);

        $this->db->execute();

        $data['title'] = "Messages";
        $this->view('/messages/merci', $data);
    }

    public function delete()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);

        $this->db->query("SELECT * FROM avis WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['avis'] = $this->db->single();

        $data['title'] = "Notices";
        $this->template('header', $data);
        $this->view('/notices/delete', $data['avis']);
    }

    public function removeNotices()
    {
        $id = $_POST['id'];

        $this->db->query("DELETE FROM avis WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->execute();

        $this->redirect('/notices/read');
    }
    public function validate()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);

        $this->db->query("SELECT * FROM avis WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['avis'] = $this->db->single();

        $data['title'] = "Notices";
        $this->template('header', $data);
        $this->view('/notices/validate', $data);
    }
    public function validateNotices()
    {
        $id = $_POST['id'];
        $status = 'validate';

        $this->db->query("UPDATE avis SET status = :status WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->bind(":status", $status);

        $this->db->execute();

        $this->redirect('/notices/read');
}
}
