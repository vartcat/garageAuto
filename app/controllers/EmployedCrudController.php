<?php

use MyApp\Controller;

class EmployedCrudController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        $sql = 'SELECT * FROM user';
        try {
            $this->db->query($sql);
            $users = $this->db->resultSet(PDO::FETCH_ASSOC);
            $data['users'] = $users;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $data['title'] = "EmployedCrud";
        $this->template('header', $data);
        $this->view('/employedCrud/read', $data);
        $this->template('footer');
    }

    public function create()
    {
        $data['title'] = "EmployedCrud";
        $this->template('header', $data);
        $this->view('/employedCrud/create', $data);
        $this->template('footer');
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
            return $this->redirect('/employedCrud/create');
        }

        $this->db->query('INSERT INTO user (name, lastname, email, password, role) VALUES (:name, :lastname, :email, :password, :role)');

        // Insert new record into the contacts table
        $this->db->bind(":email", $email);
        $this->db->bind(":password", password_hash($password, PASSWORD_DEFAULT));
        $this->db->bind(":name", $name);
        $this->db->bind(":lastname", $lastname);
        $this->db->bind(":role", $role);

        $this->db->execute();

        $this->redirect('/employedCrud/read');
    }

    public function update()
    {
        $data['title'] = "EmployedCrud";
        $this->template('header', $data);
        $this->view('/employedCrud/update', $data);
        $this->template('footer');
    }

    public function delete()
    {
        $data['title'] = "EmployedCrud";
        $this->template('header', $data);
        $this->view('/employedCrud/delete', $data);
        $this->template('footer');
    }
}
