<?php

use MyApp\Controller;

class NoticesController extends Controller
{
    private $notices;

    public function __construct()
    {
        parent::__construct();
        $this->notices = $this->model('Notices');
    }

    // page avis user
    public function read()
    {
        $data['title'] = "Notices";
        $data['notices'] = $this->notices->getNotices();

        $this->template('header', $data);
        $this->view('notices/read', $data);
    }

    // page avis create form
    public function create()
    {
        $data['title'] = "Notices";
        $this->template('header', $data);
        $this->view('/notices/create', $data);
    }

    public function addNotices()
    {
        try {
            $data['title'] = "Messages";

            $name = htmlspecialchars($_POST['name']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $avis = htmlspecialchars($_POST['avis']);
            $status = "standing";
            $note = htmlspecialchars($_POST['rating']);

            $this->notices->create($name, $lastname, $email, $avis, $status, $note);

            $this->view('/messages/merci', $data);
        } catch (Exception $e) {
            $this->handleError($e, "ajout momentanement indisponible");

        }
    }

    // page notices user delete
    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));

            $data['id'] = end($segment);
            $data['title'] = "Notices";
            $data['avis'] = $this->notices->getById($data['id']);

            if (!$data['avis']) {
                throw new Exception("L'avis demandé n'existe pas.");
            }

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

            $this->notices->deleteById($id);

            $this->redirect('/notices/read');
        } catch (Throwable $e) {
            $this->handleError($e, "suppression momentanement indisponible");
        }
    }

    // page notices user validate
    public function validate()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            
            $data['id'] = end($segment);
            $data['title'] = "Notices";
            $data['avis'] = $this->notices->getById($data['id']);

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

            $this->notices->validateById($id);

            $this->redirect('/notices/read');
        } catch (Throwable $e) {
            $this->handleError($e, "validation momentanement indisponible");
        }
    }    
}
