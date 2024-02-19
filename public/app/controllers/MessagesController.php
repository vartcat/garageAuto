<?php

use MyApp\Controller;

class MessagesController extends Controller
{
    private $messages;

    public function __construct() 
    {
        parent::__construct();
        $this->messages = $this->model('Messages');
    }

    // page messages user
    public function read()
    {
        try {
            $data['title'] = "Messages";
            $data['messages'] = $this->messages->getMessages();

            $this->template('header', $data);
            $this->view('/messages/read', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "lectures des messages indisponible");
        }
    }

    public function addMessages()
    {
        try {
            if (!isset($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['message'])) {
                throw new Exception("Certains champs requis sont manquants. Veuillez remplir tous les champs obligatoires.");
            }

            $name = htmlspecialchars($_POST['name']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : null;
            $service = isset($_POST['service']) ? htmlspecialchars($_POST['service']) : null;
            $sujet = isset($_POST['sujet']) ? htmlspecialchars($_POST['sujet']) : null;
            $message = htmlspecialchars($_POST['message']);

            $this->messages->create($name, $lastname, $email, $telephone, $service, $sujet, $message);

            // Affichage de la page de remerciements
            $data['title'] = "Messages";

            $this->view('/messages/merci', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "ajout momentanement indisponible");
        }
    }

    // page messages user delete validation
    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));

            $data['title'] = "Messages";
            $data['id'] = end($segment);
            $data['messages'] = $this->messages->getById($data['id']);

            $this->template('header', $data);
            $this->view('/messages/delete', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "suppresion momentanement indisponible");
        }
    }

    public function removeMessages()
    {
        try {
            if (!isset($_POST['id'])) {
                throw new Exception("L'identifiant du message à supprimer est manquant. Veuillez sélectionner un message à supprimer.");
            }
            $id = $_POST['id'];

            $this->messages->deleteById($id);

            $this->redirect('/messages/read');
        } catch (Throwable $e) {
            $this->handleError($e, "suppression momentanement indisponible");
        }
    }
}
