<?php

use MyApp\Controller;

class OpenTimesController extends Controller
{
    private $openTimes;

    public function __construct() 
    {
        parent::__construct();
        $this->openTimes = $this->model('OpenTimes');
    }

    public function read()
    {
        try {
            $data['title'] = "OpenTimes";
            $data['openTimes'] = $this->openTimes->getOpeningHours();

            $this->template('header', $data);
            $this->view('openTimes/read', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "Aucun horaire disponible");
        }
    }

    public function update()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));

            $data['title'] = "OpenTimes";
            $data['id'] = end($segment);
            $data['horaires'] = $this->openTimes->getOpeningHoursById($data['id']);

            $this->template('header', $data);
            $this->view('/openTimes/update', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "Modification impossible");
        }
    }

    public function updateOpenTimes()
    {
        try {
            if (!isset($_POST['id'], $_POST['jour'], $_POST['ouverture'], $_POST['fermeture'])) {
                throw new Exception("Données manquantes pour la mise à jour des horaires.");
            }

            $id = $_POST['id'];
            $jour = $_POST['jour'];
            $ouverture = $_POST['ouverture'];
            $fermeture = $_POST['fermeture'];

            $isOpenTimeExist = $this->openTimes->getOpeningHoursById($id);

            if (!$isOpenTimeExist) {
                return $this->redirect('/openTimes/read');
            }

            $this->openTimes->update($id, $jour, $ouverture, $fermeture);

            $this->redirect('/openTimes/read');
        } catch (Throwable $e) {
            $this->handleError($e, "Modification non valide");
        }
    }
}
