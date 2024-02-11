<?php

session_start();

use MyApp\Controller;

class LoginController extends Controller
{
    public function construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = "Login";
        $this->template('header', $data);
        $this->view('login', $data);
    }
    public function authenticate()
    {
        if (isset($_POST['email'], $_POST['password'])) {
            // Filtrer et valider l'adresse email
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];

            // Vérifier si l'email est valide
            if ($email === false) {
                $_SESSION['error'] = 'Mots de passe ou email incorrect';
                $this->redirect('/login');
                return;
            }
            $this->db->query("SELECT * FROM user WHERE email = :email");
            $this->db->bind(":email", $email);
            $user = $this->db->single();

            if (password_verify($password, $user['password'])) {
                $isAdmin = $user['role'] === 'admin';
                // Définir la session après l'authentification
                $this->setSession($isAdmin);
                $location = $isAdmin ? '/admin' : '/user';
                $this->redirect($location);
            } else {
                // Si l'authentification échoue, un message d'erreur
                $_SESSION['error'] = 'Mots de passe ou email incorrect';
                $this->redirect('/login');
            }
        }
    }
    private function setSession($isAdmin)
    {
        // l'ID de session pour prévenir les attaques de fixation de session
        session_regenerate_id(true);
        // les variables de session pour l'utilisateur authentifié
        $_SESSION[$isAdmin ? 'admin' : 'user'] = true;
        // les messages d'erreur précédents sont éffacés
        unset($_SESSION['error']);
    }
}
