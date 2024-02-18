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
        try {
            $name = htmlspecialchars($_POST['name']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $avis = htmlspecialchars($_POST['avis']);
            $status = "standing";
            $note = htmlspecialchars($_POST['rating']);

            $this->db->query('INSERT INTO avis (name, lastname, email, avis, status, note) VALUES (:name, :lastname, :email, :avis, :status, :note)');

            $this->db->bind(":name", $name);
            $this->db->bind(":lastname", $lastname);
            $this->db->bind(":email", $email);
            $this->db->bind(":avis", $avis);
            $this->db->bind(":status", $status);
            $this->db->bind(":note", $note);

            $this->db->execute();

            $data['title'] = "Messages";
            $this->view('/messages/merci', $data);
        } catch (Exception $e) {
            $this->handleError($e, "ajout momentanement indisponible");

        }
    }


    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            $data['id'] = end($segment);

            $this->db->query("SELECT * FROM avis WHERE id = :id");
            $this->db->bind(":id", $data['id']);
            $data['avis'] = $this->db->single();

            if (!$data['avis']) {
                throw new Exception("L'avis demandé n'existe pas.");
            }

            $data['title'] = "Notices";
            $this->template('header', $data);
            $this->view('/notices/delete', $data['avis']);
        } catch (Exception $e) {
            $this->handleError($e, "suppression momentanement indisponible");

        }
    }

    public function removeNotices()
    {
        try {
            $id = $_POST['id'];

            $this->db->query("DELETE FROM avis WHERE id = :id");

            $this->db->bind(":id", $id);
            $this->db->execute();

            $this->redirect('/notices/read');
        } catch (Throwable $e) {
            $this->handleError($e, "suppression momentanement indisponible");
        }
    }

    public function validate()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            $data['id'] = end($segment);

            $this->db->query("SELECT * FROM avis WHERE id = :id");
            $this->db->bind(":id", $data['id']);
            $data['avis'] = $this->db->single();

            $data['title'] = "Notices";
            $this->template('header', $data);
            $this->view('/notices/validate', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "validation momentanement indisponible");
        }
    }

    public function validateNotices()
    {
        try {
            $id = $_POST['id'];
            $status = 'validate';

            $this->db->query("UPDATE avis SET status = :status WHERE id = :id");

            $this->db->bind(":id", $id);
            $this->db->bind(":status", $status);

            $this->db->execute();

            $this->redirect('/notices/read');
        } catch (Throwable $e) {
            $this->handleError($e, "validation momentanement indisponible");
        }
    }    
}
