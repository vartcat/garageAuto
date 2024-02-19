<?php

use MyApp\Controller;

require_once 'NoticesController.php';

class HomeController extends Controller
{
    public function index()
    {
        $services = $this->model('Services');
        $openTimes = $this->model('OpenTimes');
        $notices = $this->model('Notices');

        try {
            $data = [
                'title' => "Home",
                'prestations' => $services->getAll(),
                'notices' => $notices->getNotices(),
                'openTimes' => $openTimes->getOpeningHours()
            ];

            $this->template('header', $data);
            $this->view('home', $data);
            $this->template('footer', $data);
        } catch (Throwable $e) {
            $this->handleError($e, "page momentanement indisponible");
        }
    }
}
