<?php

use MyApp\Controller;

class OccasionsController extends Controller
{

    private $occasions;

    public function __construct()
    {
        parent::__construct();
        $this->occasions = $this->model('Occasions');
    }

    // page occasions
    public function index()
    {
        try {
            $openTimes = $this->model('OpenTimes');

            $data['title'] = "Occasions";
            $data['occasions'] = $this->occasions->getAll();
            $data['openTimes'] = $openTimes->getOpeningHours();

            $this->template('header', $data);
            $this->view('occasions/occasions', $data);
            $this->template('footer', $data);
        } catch (Exception $e) {
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }

    // page occasions user
    public function read()
    {
        try {
            $occasions = $this->occasions->getAll();

            foreach ($occasions as &$occasion) {
                $occasion['photosCount'] = count($occasion['photos']);
            }

            $data['occasions'] = $occasions;
            $data['title'] = "OccasionsCrud";

            $this->template('header', $data);
            $this->view('occasions/read', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "occasion momentanement indisponible");
        }
    }

    // page occasions user create form
    public function create()
    {
        try {
            $data['title'] = "OccasionsCrud";
            $this->template('header', $data);
            $this->view('occasions/create', $data);
        } catch (Exception $e) {
            $this->handleError($e, "Une erreur s'est produite lors de la création de l'occasion.");
        }
    }

    public function addOccasions()
    {
        try {
            $modele = $_POST['modele'];
            $annee = $_POST['annee'];
            $boite = $_POST['boite'];
            $description = $_POST['description'];
            $carburant = $_POST['carburant'];
            $kilometre = $_POST['kilometre'];
            $prix = $_POST['prix'];

            $this->occasions->create($modele, $annee, $boite, $description, $carburant, $kilometre, $prix);

            $this->redirect('/occasions/read');
        } catch (Throwable $e) {
            $this->handleError($e, "ajout d'occasion momentanement indisponible");
        }
    }

    // page occasions user delete validation
    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));

            $data['title'] = "Occasions";
            $data['id'] = end($segment);
            $data['occasions'] = $this->occasions->getById($data['id']);

            $this->template('header', $data);
            $this->view('/occasions/delete', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "suppression momentanement indisponible");
        }
    }

    public function removeOccasions()
    {
        try {
            $id = $_POST['id'];

            $this->occasions->deleteById($id);

            $this->redirect('/occasions/read');
        } catch (Throwable $e) {
            $this->handleError($e, "suppression non valide");
        }
    }

    // page occasions user update form
    public function update()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));

            $data['title'] = "Occasions";
            $data['id'] = end($segment);
            $data['occasions'] = $this->occasions->getById($data['id']);
            $data['photos'] = $this->occasions->getPhotosByOccasionId($data['id']);

            $this->template('header', $data);
            $this->view('/occasions/update', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "modification momentanement indisponible");
        }
    }

    public function updateOccasions()
    {
        try {
            $id = $_POST['id'];
            $modele = $_POST['modele'];
            $annee = $_POST['annee'];
            $description = $_POST['description'];
            $carburant = $_POST['carburant'];
            $kilometre = $_POST['kilometre'];
            $prix = $_POST['prix'];

            $this->occasions->update($id, $modele, $annee, $description, $carburant, $kilometre, $prix);

            $this->redirect('/occasions/read');
        } catch (Throwable $e) {
            $this->handleError($e, 'suppression momentanement indisponible');
        }
    }
}
