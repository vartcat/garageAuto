<?php

use MyApp\Controller;

class MessagesController extends Controller
{
    public function read()
    {
        try {
            $sql = 'SELECT * FROM messages';
            $this->db->query($sql);

            $data['messages'] = $this->db->resultSet();

            $data['title'] = "Messages";

            $this->template('header', $data);
            $this->view('/messages/read', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
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

            $this->db->query('INSERT INTO messages (name, lastname, email, telephone, service, sujet, message) VALUES (:name, :lastname, :email, :telephone, :service, :sujet, :message)');
            $this->db->bind(":name", $name);
            $this->db->bind(":lastname", $lastname);
            $this->db->bind(":email", $email);
            $this->db->bind(":telephone", $telephone, PDO::PARAM_INT);
            $this->db->bind(":service", $service);
            $this->db->bind(":sujet", $sujet);
            $this->db->bind(":message", $message);
            $this->db->execute();

            // Affichage de la page de remerciements
            $data['title'] = "Messages";
            $this->view('/messages/merci', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            $data['id'] = end($segment);

            $this->db->query("SELECT * FROM messages WHERE id = :id");
            $this->db->bind(":id", $data['id']);

            $data['messages'] = $this->db->single();

            if (!$data['messages']) {
                throw new Exception("Le message que vous essayez de supprimer n'existe pas.");
            }

            $data['title'] = "Messages";

            $this->template('header', $data);
            $this->view('/messages/delete', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function removeMessages()
    {
        try {
            if (!isset($_POST['id'])) {
                throw new Exception("L'identifiant du message à supprimer est manquant. Veuillez sélectionner un message à supprimer.");
            }

            $id = htmlspecialchars($_POST['id']);

            $this->db->query("DELETE FROM messages WHERE id = :id");
            $this->db->bind(":id", $id);
            $this->db->execute();

            $this->redirect('/messages/read');
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
