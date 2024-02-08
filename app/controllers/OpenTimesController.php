<?php

use MyApp\Controller;

require_once 'FooterController.php';

class OpenTimesController extends Controller
{
    /**
     * Display the index page.
     */
    public function read()
    {
        $data['title'] = "OpenTimes";
        $data['openTimes'] = FooterController::getOpeningHours();
        $this->template('header', $data);
        $this->view('openTimes/read', $data);
    }
    
    public function update()
    {
        $data['title'] = "OpenTimes";
        $this->template('header', $data);
        $this->view('openTimes/update', $data);
    }
}
