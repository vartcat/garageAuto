<?php

use MyApp\Controller;

require_once 'MessagesController.php';

class ServicesController extends Controller
{
    private $services;

    public function __construct()
    {
        parent::__construct();
        $this->services = $this->model('Services');
    }

    // page services
    public function index()
    {
        try {
            $openTimes = $this->model('OpenTimes');
            $data['title'] = "Services";
            $data['prestations'] = $this->services->getAll();
            $data['openTimes'] = $openTimes->getOpeningHours();

            $this->template('header', $data);
            $this->view('services/services', $data);
            $this->template('footer', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "services momentanement indisponible");
        }
    }

    // page services admin
    public function read()
    {
        try {
            $data['title'] = "Services";
            $data['prestations'] = $this->services->getAll();
            
            $this->template('header', $data);
            $this->view('services/read', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "services momentanement indisponible");
        }
    }

    // page services admin create form
    public function create()
    {
        try {
            $data['title'] = "Services";
            $this->template('header', $data);
            $this->view('/services/create', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "ajout prestation impossible");
        }
    }

    public function addServices()
    {
        try {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';

            if (empty($name) || empty($description) || empty($price) || empty($_FILES['photo']['name'])) {
                $this->redirect('/services/create', ['error' => 'Tous les champs sont obligatoires.']);
            }

            $photo = $_FILES['photo'];

            if ($photo['error'] !== UPLOAD_ERR_OK) {
                $this->redirect('/services/create', ['error' => 'Une erreur s\'est produite lors du téléchargement de la photo.']);
            }

            $this->services->create($name, $description, $price, $photo);

            $this->redirect('/services/read');
        } catch (Throwable $e) {
            $this->handleError($e, "ajout de prestation indisponible");
        }
    }

    // page services admin update form
    public function update()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            
            $data['id'] = end($segment);
            $data['title'] = "Services";

            $data['prestations'] = $this->services->getById($data['id']);

            $this->template('header', $data);
            $this->view('/services/update', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "mofification non valide");
        }
    }

    public function updateServices()
    {
        try {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $removePhoto = !empty($_POST['delete_photos']) ? $_POST['delete_photos'] : null;
            
            $photo = isset($_FILES['photo']) ? $_FILES['photo'] : null;

            if (!empty($_FILES['photo']['name']) && $photo['error'] > 0) {
                $this->redirect('/services/read', ['error' => 'Une erreur s\'est produite lors du téléchargement de la photo.']);
            }
            
            $isServiceExist = $this->services->getById($id);
            
            if (!$isServiceExist) {
                return $this->redirect('/services/read');
            }

            $this->services->update($photo, $id, $name, $description, $price, $removePhoto);

            $this->redirect('/services/read');
        } catch (Throwable $e) {
            $this->handleError($e, "modification momentanement indisponible");
        }
    }

    // page services admin delete
    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));

            $data['id'] = end($segment);
            $data['title'] = "Services";
            $data['prestations'] = $this->services->getById($data['id']);
            
            $this->template('header', $data);
            $this->view('/services/delete', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "suppression momentanement indisponible");
        }
    }

    public function removeServices()
    {
        try {
            $id = $_POST['id'];

            $this->services->deleteById($id);

            $this->redirect('/services/read');
        } catch (Throwable $e) {
            $this->handleError($e, "suppression non valide");
        }
    }
}

