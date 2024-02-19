<?php

class OpenTimes
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getOpeningHours()
    {
        $this->db->query("SELECT * FROM horaires");
        return $this->db->resultSet();
    }

    public function update($id, $jour, $ouverture, $fermeture)
    {
        $this->db->query("UPDATE horaires SET jour = :jour, ouverture = :ouverture, fermeture = :fermeture WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->bind(":jour", $jour);
        $this->db->bind(":ouverture", $ouverture);
        $this->db->bind(":fermeture", $fermeture);
        $this->db->execute(); 
    }

    public function getOpeningHoursById($id) {
        $this->db->query("SELECT * FROM horaires WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }
}
