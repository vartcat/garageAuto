<?php

use MyApp\Controller;

class EmployedController extends Controller
{
    private $employed;

    public function __construct()
    {
        parent::__construct();
        $this->employed = $this->model('Employed');
    }
    // page services admin
    public function read()
    {
        try {
            $data['title'] = "Employed";
            $data['users'] = $this->employed->getAll();

            $this->template('header', $data);
            $this->view('/employed/read', $data);
        } catch (Exception $e) {
            $this->handleError($e, "Une erreur s'est produite lors de la lecture des utilisateurs.");
        }
    }

    // page employed user create form
    public function create()
    {
        try {
            $data['title'] = "Employed";
            $this->template('header', $data);
            $this->view('/employed/create', $data);
        } catch (Exception $e) {
            $this->handleError($e, "Une erreur s'est produite lors de la création de l'utilisateur.");
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

            $this->employed->create($name, $lastname, $email, $password, $role);

            $this->redirect('/employed/read');
        } catch (Exception $e) {
            $this->handleError($e, "Une erreur s'est produite lors de l'ajout de l'utilisateur : " . $e->getMessage());
        }
    }

    // page employed admin update form
    public function update()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));

            $data['id'] = end($segment);
            $data['title'] = "Employed";

            $data['user'] = $this->employed->getById($data['id']);

            $this->template('header', $data);
            $this->view('/employed/update', $data);
        } catch (Exception $e) {
            $this->handleError($e, "Une erreur s'est produite lors de la mise à jour de l'utilisateur.");
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

            $isUserExist = $this->employed->getById($id);

            if (!$isUserExist) {
                throw new Exception("L'utilisateur n'existe pas.");
            }

            $this->employed->update($id, $name, $lastname, $email, $newPassword, $role);

            $this->redirect('/employed/read');
        } catch (Exception $e) {
            $this->handleError($e, "Une erreur s'est produite lors de la mise à jour de l'utilisateur");
        }
    }

    // page employed admin delete
    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));

            $data['id'] = end($segment);
            $data['title'] = "Employed";
            
            $data['user'] = $this->employed->getById($data['id']);

            $this->template('header', $data);
            $this->view('/employed/delete', $data);
        } catch (Exception $e) {
            $this->handleError($e, "Une erreur s'est produite lors de la suppression de l'utilisateur.");
        }
    }

    public function removeEmployed()
    {
        try {
            $id = $_POST['id'];

            $this->employed->deleteById($id);

            $this->redirect('/employed/read');
        } catch (Exception $e) {
            $this->handleError($e, "suppression non valide");
        }
    }

}
