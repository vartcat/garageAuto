<?php

use MyApp\Controller;

class EmployedController extends Controller
{
    public function read()
    {
        $sql = 'SELECT * FROM user';
        $this->db->query($sql);
        $data['users'] = $this->db->resultSet();
        $data['title'] = "Employed";
        $this->template('header', $data);
        $this->view('/employed/read', $data);
    }

    public function create()
    {
        $data['title'] = "Employed";
        $this->template('header', $data);
        $this->view('/employed/create', $data);
    }

    public function addEmployed()
    {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind(":email", $email);
        $isUserAlreadyExist = $this->db->single();

        if ($isUserAlreadyExist) {
            return $this->redirect('/employed/create');
        }

        $this->db->query('INSERT INTO user (name, lastname, email, password, role) VALUES (:name, :lastname, :email, :password, :role)');

        // Insert new record into the contacts table
        $this->db->bind(":email", $email);
        $this->db->bind(":password", password_hash($password, PASSWORD_DEFAULT));
        $this->db->bind(":name", $name);
        $this->db->bind(":lastname", $lastname);
        $this->db->bind(":role", $role);

        $this->db->execute();

        $this->redirect('/employed/read');
    }

    public function update()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);

        $this->db->query("SELECT * FROM user WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['user'] = $this->db->single();

        $data['title'] = "Employed";
        $this->template('header', $data);
        $this->view('/employed/update', $data);
    }

    public function delete()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);
        
        $this->db->query("SELECT * FROM user WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['user'] = $this->db->single();
        
        $data['title'] = "Employed";
        $this->template('header', $data);
        $this->view('/employed/delete', $data);
    }

    public function removeEmployed()
    {
        $id = $_POST['id'];
        $this->db->query("DELETE FROM user WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->execute();

        $this->redirect('/employed/read');
    }

    public function updateEmployed()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $newPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query("SELECT * FROM user WHERE id = :id");
        $this->db->bind(":id", $id);
        $isUserExist = $this->db->single();
        if (!$isUserExist) {
            return $this->redirect('/employed/read');
        }

        $this->db->query("UPDATE user SET name = :name, lastname = :lastname, email = :email, password = :newPassword, role = :role WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->bind(":email", $email);
        $this->db->bind(":newPassword", $newPassword);
        $this->db->bind(":name", $name);
        $this->db->bind(":lastname", $lastname);
        $this->db->bind(":role", $role);

        $this->db->execute();

        $this->redirect('/employed/read');
    }
}
