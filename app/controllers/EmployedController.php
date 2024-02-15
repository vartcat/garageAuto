<?php

use MyApp\Controller;

class EmployedController extends Controller
{
    public function read()
    {
        try {
            $sql = 'SELECT * FROM user';
            $this->db->query($sql);
            $data['users'] = $this->db->resultSet();
            $data['title'] = "Employed";
            $this->template('header', $data);
            $this->view('/employed/read', $data);
        } catch (Exception $e) {
            $this->handleError("Une erreur s'est produite lors de la lecture des utilisateurs.");
        }
    }

    public function create()
    {
        try {
            $data['title'] = "Employed";
            $this->template('header', $data);
            $this->view('/employed/create', $data);
        } catch (Exception $e) {
            $this->handleError("Une erreur s'est produite lors de la création de l'utilisateur.");
        }
    }

    public function addEmployed()
    {
        try {
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            // Vérification si l'utilisateur existe déjà
            $this->db->query("SELECT * FROM user WHERE email = :email");
            $this->db->bind(":email", $email);
            $isUserAlreadyExist = $this->db->single();
            if ($isUserAlreadyExist) {
                throw new Exception("L'utilisateur avec cet email existe déjà.");
            }

            // Insertion de l'utilisateur
            $this->db->query('INSERT INTO user (name, lastname, email, password, role) VALUES (:name, :lastname, :email, :password, :role)');
            $this->db->bind(":email", $email);
            $this->db->bind(":password", password_hash($password, PASSWORD_DEFAULT));
            $this->db->bind(":name", $name);
            $this->db->bind(":lastname", $lastname);
            $this->db->bind(":role", $role);
            $this->db->execute();

            $this->redirect('/employed/read');
        } catch (Exception $e) {
            $this->handleError("Une erreur s'est produite lors de l'ajout de l'utilisateur : " . $e->getMessage());
        }
    }

    public function update()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            $data['id'] = end($segment);

            $this->db->query("SELECT * FROM user WHERE id = :id");
            $this->db->bind(":id", $data['id']);
            $data['user'] = $this->db->single();

            $data['title'] = "Employed";
            $this->template('header', $data);
            $this->view('/employed/update', $data);
        } catch (Exception $e) {
            $this->handleError("Une erreur s'est produite lors de la mise à jour de l'utilisateur.");
        }
    }

    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            $data['id'] = end($segment);

            $this->db->query("SELECT * FROM user WHERE id = :id");
            $this->db->bind(":id", $data['id']);
            $data['user'] = $this->db->single();

            $data['title'] = "Employed";
            $this->template('header', $data);
            $this->view('/employed/delete', $data);
        } catch (Exception $e) {
            $this->handleError("Une erreur s'est produite lors de la suppression de l'utilisateur.");
        }
    }

    public function removeEmployed()
    {
        try {
            $id = $_POST['id'];
            $this->db->query("DELETE FROM user WHERE id = :id");

            $this->db->bind(":id", $id);
            $this->db->execute();

            $this->redirect('/employed/read');
        } catch (Exception $e) {
            $this->handleError("Une erreur s'est produite lors de la suppression de l'utilisateur.");
        }
    }

    public function updateEmployed()
    {
        try {
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
                throw new Exception("L'utilisateur n'existe pas.");
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
        } catch (Exception $e) {
            $this->handleError("Une erreur s'est produite lors de la mise à jour de l'utilisateur : " . $e->getMessage());
        }
    }
    private function handleError($errorMessage)
    {
        echo $errorMessage;
    }
}
