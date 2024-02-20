<?php

/**
 * Database Configuration
 */
define("DB_HOST", "localhost"); // you can add specified port number ex: localhost:3306
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "development_garage_automobile");

/**
 * Base URL Configuration
 */
define("BASEURL", "http://localhost");

/**
 * Environment Configuration
 */
define("ENVIRONMENT", "development");


/**
 * S3 Configuration
 */
define("S3_BUCKET", "vparrot");
define("S3_REGION", "eu-north-1");
define("S3_APIKEY", "AKIA5FTZCSLVV2QRUWVD");
define("S3_SECRET", "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");
define("S3_BASEURL", "https://vparrot.s3.eu-north-1.amazonaws.com/");

/**
 * Disable Error Reporting on Production
 */
if (ENVIRONMENT === "production") {
    error_reporting(0);
    ini_set("display_errors", "Off");
}
