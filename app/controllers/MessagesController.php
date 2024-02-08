<?php

use MyApp\Controller;

class MessagesController extends Controller
{
    public function read()
    {
        $sql = 'SELECT * FROM messages';
        $this->db->query($sql);

        $data['messages'] = $this->db->resultSet();
        $data['title'] = "Messages";
        $this->template('header', $data);
        $this->view('/messages/read', $data);
    }
    public function addMessages()
    {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];

        $this->db->query('INSERT INTO message (name, lastname, email, telephone, sujet, message) VALUES (:name, :lastname, :email, :telephone, :sujet, :message)');

        $this->db->bind(":name", $name);
        $this->db->bind(":lastname", $lastname);
        $this->db->bind(":email", $email);
        $this->db->bind(":telephone", $telephone);
        $this->db->bind(":sujet", $sujet);
        $this->db->bind(":message", $message);

        $this->db->execute();

        $this->redirect('/messages/read');
    }
    public function delete()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);
        
        $this->db->query("SELECT * FROM messages WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['messages'] = $this->db->single();
        
        $data['title'] = "Messages";
        $this->template('header', $data);
        $this->view('/messages/delete', $data);
    }

    public function removeMessages()
    {
        $id = $_POST['id'];
        $this->db->query("DELETE FROM messages WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->execute();

        $this->redirect('/messages/read');
    }
}