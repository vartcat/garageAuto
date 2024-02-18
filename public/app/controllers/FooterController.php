<?php

use MyApp\Database;

class FooterController
{
    public static function getOpeningHours()
    {
        try {
        $db = new Database();
        $db->query("SELECT * FROM horaires");
        return $db->resultSet();
    } catch (Throwable $e) {
        return "Une erreur s'est produite lors de la génération du bas de page.";
    }
    }
}
