<?php

use MyApp\Controller;
use MyApp\Database;

session_start();
/**
 * UserController Class
 *
 * Represents the controller for the user-related functionality.
 */
class UserController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        if($_SESSION['user']) {
            $data['title'] = "User";
            $this->template('header', $data);
            $this->view('user', $data);
        } else {
            $this->redirect('/login');
        }
    }
}
