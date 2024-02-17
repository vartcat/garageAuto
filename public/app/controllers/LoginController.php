<?php

session_start();

use MyApp\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        try {
            $data['title'] = "Login";
            $this->template('header', $data);
            $this->view('login', $data);
        } catch (Exception $e) {
            // Gérer l'exception
            echo 'Une erreur est survenue : ' . $e->getMessage();
        }
    }

    public function authenticate()
    {
        try {
            if (isset($_POST['email'], $_POST['password'])) {
                // Filtrer et valider l'adresse email
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $password = $_POST['password'];

                // Vérifier si l'email est valide
                if ($email === false) {
                    throw new Exception('Adresse email invalide');
                }

                $this->db->query("SELECT * FROM user WHERE email = :email");
                $this->db->bind(":email", $email);
                $user = $this->db->single();

                if (!$user) {
                    throw new Exception('Utilisateur non trouvé');
                }

                if (password_verify($password, $user['password'])) {
                    $isAdmin = $user['role'] === 'admin';
                    // Définir la session après l'authentification
                    $this->setSession($isAdmin);
                    $location = $isAdmin ? '/admin' : '/user';
                    $this->redirect($location);
                } else {
                    // Si l'authentification échoue, un message d'erreur
                    throw new Exception('Mots de passe incorrect');
                }
            } else {
                throw new Exception('Tous les champs requis ne sont pas fournis');
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->redirect('/login');
        }
    }

    private function setSession($isAdmin)
    {
        session_regenerate_id(true);
        $_SESSION[$isAdmin ? 'admin' : 'user'] = true;
        unset($_SESSION['error']);
    }
}