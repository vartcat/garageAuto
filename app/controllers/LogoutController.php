<?php

use MyApp\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        try {
            $data['title'] = "Logout";
            $this->template('header', $data);
            $this->view('logout', $data);
        } catch (Exception $e) {
            // Gérer l'exception
            echo 'Une erreur est survenue : ' . $e->getMessage();
        }
    }

    public function logout()
    {
        try {
            session_start();
            session_unset();
            session_destroy();
            header("Location: /home");
            exit();
        } catch (Exception $e) {
            // Gérer l'exception
            echo 'Une erreur est survenue : ' . $e->getMessage();
        }
    }
}


