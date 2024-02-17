
<?php

use MyApp\Controller;

session_start();

class UserController extends Controller
{
    public function index()
    {
        try {
            if (!isset($_SESSION['user'])) {
                throw new Exception("User session not found. Please log in.");
            }
            
            $data['title'] = "User";
            $this->template('header', $data);
            $this->view('user', $data);
        } catch (Exception $e) {
            // Log l'erreur ou redirige vers une page d'erreur
            $this->redirect('/error', ['message' => $e->getMessage()]);
        }
    }
}
