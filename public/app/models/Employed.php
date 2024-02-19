<?php

class Employed
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM user';
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function create($name, $lastname, $email, $password,  $role)
    {
            $this->db->query('INSERT INTO user (name, lastname, email, password, role) 
                VALUES (:name, :lastname, :email, :password, :role)');

                $this->db->bind(":email", $email);
                $this->db->bind(":password", password_hash($password, PASSWORD_DEFAULT));
                $this->db->bind(":name", $name);
                $this->db->bind(":lastname", $lastname);
                $this->db->bind(":role", $role);
                $this->db->execute();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM user WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function update($id, $name, $lastname, $email, $newPassword, $role)
    {
        $this->db->query("UPDATE user SET name = :name, lastname = :lastname, email = :email, password = :newPassword, role = :role WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->bind(":name", $name);
        $this->db->bind(":lastname", $lastname);
        $this->db->bind(":email", $email);
        $this->db->bind(":newPassword", $newPassword);
        $this->db->bind(":role", $role);

        $this->db->execute();
    }

    public function deleteById($id)
    {
        $this->db->query("DELETE FROM user WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

}
