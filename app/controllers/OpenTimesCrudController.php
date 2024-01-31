<?php

use MyApp\Controller;

class OpenTimesCrudController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        $sql = 'SELECT * FROM horaires';
        try {
            $this->db->query($sql);
            $openTimes = $this->db->resultSet(PDO::FETCH_ASSOC);
            $data['openTimes'] = $openTimes;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $data['title'] = "OpenTimesCrud";
        $this->template('header', $data);
        $this->view('/openTimesCrud/read', $data);
    }
    public function update()
    {
        $data['title'] = "OpenTimesCrud";
        $this->template('header', $data);
        $this->view('/openTimesCrud/update', $data);
    }
}
