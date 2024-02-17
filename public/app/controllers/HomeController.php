<?php

use MyApp\Controller;

require_once 'FooterController.php';
require_once 'NoticesController.php';
require_once 'ServicesController.php';

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'title' => "Home",
                'prestations' => ServicesController::getServices(),
                'notices' => NoticesController::getNotices(),
                'openTimes' => FooterController::getOpeningHours()
            ];

            $this->template('header', $data);
            $this->view('home', $data);
            $this->template('footer', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    private function handleError(Throwable $e)
    {
        $data['error_message'] = "Une erreur s'est produite. Veuillez réessayer plus tard.";
        $this->view('404', $data);
        error_log("Erreur : " . $e->getMessage());
    }
}
