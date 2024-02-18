<?php

use MyApp\Controller;

class HeaderController {

    public static function generateHeader($path)
    {
        try {
            $controller = new Controller();
            ob_start();
            $controller->template($path);
            return ob_get_clean();
        } catch (Throwable $e) {
            return "Une erreur s'est produite lors de la génération de l'en-tête.";
        }
    }
}
