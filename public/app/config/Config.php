<?php

/**
 * Database Configuration
 */
define("DB_HOST", "localhost"); // you can add specified port number ex: localhost:3306
define("DB_USER", "username");
define("DB_PASS", "password");
define("DB_NAME", "database");

/**
 * Base URL Configuration
 */
define("BASEURL", "http://localhost");

/**
 * Environment Configuration
 */
define("ENVIRONMENT", "development");

/**
 * Disable Error Reporting on Production
 */
if (ENVIRONMENT === "production") {
    error_reporting(0);
    ini_set("display_errors", "Off");
}

?>
