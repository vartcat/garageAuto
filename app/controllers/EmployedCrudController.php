<?php

use MyApp\Controller;
use MyApp\Database;

class EmployedCrudController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        $data['title'] = "EmployedCrud";
        $this->template('header', $data);
        $this->view('/employedCrud/read', $data);
        $this->template('footer');
    }

    public function create()
    {
        $data['title'] = "EmployedCrud";
        $this->template('header', $data);
        $this->view('/employedCrud/create', $data);
        $this->template('footer');
    }

    public function update()
    {
        $data['title'] = "EmployedCrud";
        $this->template('header', $data);
        $this->view('/employedCrud/update', $data);
        $this->template('footer');
    }

    public function delete()
    {
        $data['title'] = "EmployedCrud";
        $this->template('header', $data);
        $this->view('/employedCrud/delete', $data);
        $this->template('footer');
    }
}
