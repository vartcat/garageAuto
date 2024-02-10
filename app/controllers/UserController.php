<?php

use MyApp\Controller;

session_start();

class UserController extends Controller
{
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
