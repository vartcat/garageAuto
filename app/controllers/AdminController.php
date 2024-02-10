<?php

use MyApp\Controller;

session_start();

class AdminController extends Controller
{
    public function index()
    {
        if($_SESSION['admin']) {
            $data['title'] = "Admin";
            $this->template('header', $data);
            $this->view('admin', $data);
        } else {
            $this->redirect('/login');
        }
    }
}
