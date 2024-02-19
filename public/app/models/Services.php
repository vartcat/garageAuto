<?php

class Services
{
    private $db;
    private $storage;

    public function __construct($database, $storage)
    {
        $this->db = $database;
        $this->storage = $storage;
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM prestations';
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM prestations WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function create($name, $description, $price, $photo)
    {
        $photoData = file_get_contents($photo['tmp_name']);
        //envoie sur S3
        //appel de storage et telechargement image sur le bucket
        $image_path = $this->storage->uploadImage('prestations/' . $name, $photoData);

        $this->db->query('INSERT INTO prestations (name, description, price, photo) VALUES (:name, :description, :price, :photo)');
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->bind(":price", $price);
        $this->db->bind(":photo", $image_path);
        $this->db->execute();
    }

    public function update($photo, $id, $name, $description, $price, $removePhoto)
    {
        if (!empty($photo['name'])) {
            $photoData = file_get_contents($photo['tmp_name']);
            $image_path = $this->storage->uploadImage('prestations/' . $photo['name'], $photoData);

            $this->db->query("UPDATE prestations SET name = :name, description = :description, price = :price, photo = :photo WHERE id = :id");
            $this->db->bind(":photo", $image_path);
        } elseif (!empty($removePhoto)) {
            $this->storage->deleteImage($removePhoto);

            $this->db->query("UPDATE prestations SET name = :name, description = :description, price = :price, photo = :photo WHERE id = :id");
            $this->db->bind(":photo", '');
        } else {
            $this->db->query("UPDATE prestations SET name = :name, description = :description, price = :price WHERE id = :id");
        }

        $this->db->bind(":id", $id);
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->bind(":price", $price);
        $this->db->execute();
    }

    public function deleteById($id)
    {
        $services = $this->getById($id);
        $this->storage->deleteImage($services[0]['photo']);

        $this->db->query("DELETE FROM prestations WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}
