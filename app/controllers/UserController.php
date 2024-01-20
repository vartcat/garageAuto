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
        error_log(json_encode($_SESSION));

        var_dump($_SESSION['user']);

        if($_SESSION['user']) {
            $data['title'] = "User";
            $this->template('header', $data);
            $this->view('user', $data);
            $this->template('footer');
        } else {
            $this->redirect('/login');
        }
    }
}
