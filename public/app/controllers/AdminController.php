<?php

use MyApp\Controller;

session_start();

class AdminController extends Controller
{
    public function index()
    {
        try {
            if(isset($_SESSION['admin']) && $_SESSION['admin']) {
                $data['title'] = "Admin";
                $this->template('header', $data);
                $this->view('admin', $data);
            } else {
                throw new Exception("Unauthorized access");
            }
        } catch (Exception $e) {
            $this->handleError($e->getMessage());
        }
    }

    private function handleError($errorMessage) {
        echo "Error: " . $errorMessage;
    }
}

