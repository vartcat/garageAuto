<?php

use MyApp\Database;

/**
 * FooterController Class
 *
 * Represents the controller for the admin-related functionality.
 */
class FooterController
{
    public static function getOpeningHours()
    {
        $db = new Database();
        $db->query("SELECT * FROM horaires");
        return $db->resultSet();
    }
}
