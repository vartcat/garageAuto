<?php

use MyApp\Controller;
use MyApp\Database;

session_start();
/**
 * AdminController Class
 *
 * Represents the controller for the admin-related functionality.
 */
class AdminController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        if($_SESSION['admin']) {
            $data['title'] = "Admin";
            $this->template('header', $data);
            $this->view('admin', $data);
            $this->template('footer');
        } else {
            $this->redirect('/login');
        }
    }
}
