<?php

use MyApp\Controller;

require_once 'FooterController.php';
require_once 'NoticesController.php';
require_once 'ServicesController.php';

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = "Home";
        $data['services'] = ServicesController::getServices();
        $data['notices'] = NoticesController::getNotices();
        $data['openTimes'] = FooterController::getOpeningHours();
        

        $this->template('header', $data);
        $this->view('home', $data);
        $this->template('footer', $data);
    }
}
