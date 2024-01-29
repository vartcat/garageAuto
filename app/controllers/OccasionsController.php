<?php

use MyApp\Controller;
use MyApp\Database;

/**
 * OccasionsController Class
 *
 * Represents the controller for the occasions-related functionality.
 */
class OccasionsController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        $data['title'] = "Occasions";
        $this->template('header', $data);
        $this->view('occasions', $data);
        $this->template('footer');
    }
}
