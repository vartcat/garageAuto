<?php

class Notices
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    // page avis accueil
    public function getNotices()
    {
        $this->db->query("SELECT * FROM avis");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM avis WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function create($name, $lastname, $email, $avis, $status, $note)
    {
        $this->db->query('INSERT INTO avis (name, lastname, email, avis, status, note) 
            VALUES (:name, :lastname, :email, :avis, :status, :note)');

        $this->db->bind(":name", $name);
        $this->db->bind(":lastname", $lastname);
        $this->db->bind(":email", $email);
        $this->db->bind(":avis", $avis);
        $this->db->bind(":status", $status);
        $this->db->bind(":note", $note);

        $this->db->execute();
    }

    public function deleteById($id)
    {
        $this->db->query("SELECT * FROM avis WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    public function validateById($id)
    {
        $status = 'validate';

        $this->db->query("UPDATE avis SET status = :status WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->bind(":status", $status);

        $this->db->execute();
    }
}
