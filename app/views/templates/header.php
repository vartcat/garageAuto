<?php

function template_header() {
    echo <<<EOT

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V.Parrot</title>
    <link href="../../../public/css/style.css" rel="stylesheet" type="text/css">
    </head>
<nav class="navbar">
    <div class="navbar-container container">
        <input type="checkbox" name="" id="">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <ul class="menu-items">
            <li><a href="../home.php">Garage</a></li>
            <li><a href="../services.php">Prestations</a></li>
            <li><a href="../occasions.php">Occasions</a></li>
            <li><a href="../notices.php">Avis</a></li>
            <li><a href="../contact.php">Contact</a></li>
            <li><a href="../../app/views/login.php">Login</a></li>
        </ul>
        <h1 class="logo">Garage V.Parrot</h1>
    </div>
</nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>
