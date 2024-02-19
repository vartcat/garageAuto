<?php

session_start();

use MyApp\Controller;

class LoginController extends Controller
{

    // page login
    public function index()
    {
        try {
            $data['title'] = "Login";

            $this->template('header', $data);
            $this->view('login', $data);
        } catch (Exception $e) {
            $this->handleError($e, "une erreur est survenue");
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

                $employed = $this->model('Employed');
                $user = $employed->getByEmail($email);

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
            $this->handleError($e, "authentification échoué");
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
