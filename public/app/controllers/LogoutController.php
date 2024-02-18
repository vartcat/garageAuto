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
            $this->handleError($e, "une erreur est survenue");
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
            $this->handleError($e, "une erreur est survenue");

        }
    }
}


