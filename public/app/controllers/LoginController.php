<?php
session_start();
use MyApp\Controller;
class LoginController extends Controller
{
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
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $password = $_POST['password'];
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
                    $this->setSession($isAdmin);
                    $location = $isAdmin ? '/admin' : '/user';
                    $this->redirect($location);
                } else {
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
