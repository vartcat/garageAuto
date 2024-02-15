<?php

use MyApp\Controller;

class HeaderController {

    public static function generateHeader($path)
    {
        $controller = new Controller();
        ob_start();
        $controller->template($path);
        return ob_get_clean();
    }

}
