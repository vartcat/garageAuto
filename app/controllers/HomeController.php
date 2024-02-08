<?php

use MyApp\Controller;

require_once 'FooterController.php';
require_once 'NoticesController.php';

/**
 * HomeController Class
 *
 * Represents the controller for the home-related functionality.
 */
class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = "Home";
        $data['openTimes'] = FooterController::getOpeningHours();
        $data['notices'] = NoticesController::getNotices();

        $this->template('header', $data);
        $this->view('home', $data);
        $this->template('footer', $data);
    }
}
