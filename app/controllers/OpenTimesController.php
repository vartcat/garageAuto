<?php

use MyApp\Controller;

require_once 'FooterController.php';

class OpenTimesController extends Controller
{
    public function read()
    {
        try {
            $data['title'] = "OpenTimes";
            $data['openTimes'] = FooterController::getOpeningHours();
            $this->template('header', $data);
            $this->view('openTimes/read', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function update()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            $data['id'] = end($segment);

            $this->db->query("SELECT * FROM horaires WHERE id = :id");
            $this->db->bind(":id", $data['id']);
            $data['horaires'] = $this->db->single();

            $data['title'] = "OpenTimes";
            $this->template('header', $data);
            $this->view('/openTimes/update', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
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

            $this->db->query("SELECT * FROM horaires WHERE id = :id");
            $this->db->bind(":id", $id);
            $isOpenTimeExist = $this->db->single();
            if (!$isOpenTimeExist) {
                return $this->redirect('/openTimes/read');
            }

            $this->db->query("UPDATE horaires SET jour = :jour, ouverture = :ouverture, fermeture = :fermeture WHERE id = :id");

            $this->db->bind(":id", $id);
            $this->db->bind(":jour", $jour);
            $this->db->bind(":ouverture", $ouverture);
            $this->db->bind(":fermeture", $fermeture);

            $this->db->execute();

            $this->redirect('/openTimes/read');
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    private function handleError(Throwable $e)
    {
        $data['error_message'] = "Une erreur s'est produite. Veuillez réessayer plus tard.";
        $this->view('/errors/error', $data);
        error_log("Erreur : " . $e->getMessage());
    }
}
