<?php

class Messages
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getMessages()
    {
        $sql = 'SELECT * FROM messages';
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function create($name, $lastname, $email, $telephone, $service, $sujet, $message)
    {
        $this->db->query('INSERT INTO messages (name, lastname, email, telephone, service, sujet, message) 
            VALUES (:name, :lastname, :email, :telephone, :service, :sujet, :message)');

            $this->db->bind(":name", $name);
            $this->db->bind(":lastname", $lastname);
            $this->db->bind(":email", $email);
            $this->db->bind(":telephone", $telephone, PDO::PARAM_INT);
            $this->db->bind(":service", $service);
            $this->db->bind(":sujet", $sujet);
            $this->db->bind(":message", $message);
            
            $this->db->execute();
    }

    public function getById($id) 
    {
        $this->db->query("SELECT * FROM messages WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function deleteById($id) 
    {
        $this->db->query("DELETE FROM messages WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}
