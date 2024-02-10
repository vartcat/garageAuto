<?php

use MyApp\Database;

class FooterController
{
    public static function getOpeningHours()
    {
        $db = new Database();
        $db->query("SELECT * FROM horaires");
        return $db->resultSet();
    }
}
