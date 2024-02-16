<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Garage V.Parrot</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
    <link href="../../public/css/login.css" rel="stylesheet" />
    <link href="../../public/css/style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <link href="../../public/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../../public/css/responsive.css" rel="stylesheet" />
</head>
<?php
function afficherHeroArea($imgSrc)
{
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="' . $imgSrc . '">
                </div>
            </div>
    ';
}

$request_uri = $_SERVER['REQUEST_URI'];

$imagePaths = [
    '/home' => 'public/pictures/garage4.jpg',
    '/admin' => '/public/pictures/garageEnseigne.jpg',
    '/user' => '/public/pictures/garageEnseigne.jpg',
    '/services' => 'public/pictures/voiture.jpg',
    '/occasions' => 'public/pictures/occasions.jpg',
    '/occasions/read' => 'public/pictures/occasions.jpg',
    '/messages/read' => 'public/pictures/message.jpg',
    '/employed/read' => 'public/pictures/employed.jpg',
    '/notices/read' => 'public/pictures/avis.jpg',
    '/services/read' => 'public/pictures/mécanique.jpg',
    '/openTimes/read' => 'public/pictures/garage.jpg'
];

if (array_key_exists($request_uri, $imagePaths)) {
    afficherHeroArea($imagePaths[$request_uri]);
} elseif ($request_uri === '/') {
    afficherHeroArea('public/pictures/garage4.jpg');
}
?>
<!-- Header section -->
<header class="header_section">
    <div class="header_top">
        <div class="container-fluid">
            <div class="contact_link-container">
                <a href="https://www.google.com/maps/place/1+rue+du+garage,+31000+Toulouse" class="contact_link1">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                        1 rue du garage, 31000 Toulouse
                    </span>
                </a>
                <a href="tel:+011234567890" class="contact_link2">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        Tél : +01 1234567890
                    </span>
                </a>
                <a href="mailto:garage.VParrot@gmail.com" class="contact_link3">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                        garage.VParrot@gmail.com
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <div class="navbar-imgBox">
                <a class="navbar-brand" href="/home">
                    <img src="/public/pictures/logo.png" alt="Logo" class="logo">
                    <span>
                        Garage V.Parrot
                    </span>
                </a>
                </div>
                <div class="navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                    <ul id="navCustom" class="navbar-nav">
                        <?php
                        $menuItems = [
                            '/' => [
                                ['Accueil', '/home'],
                                ['Prestations', 'services'],
                                ['Occasions', 'occasions'],
                                ['Avis', '#notices'],
                                ['Contact', '#contact'],
                                ['Login', 'login']
                            ],
                            '/home' => [
                                ['Accueil', '/home'],
                                ['Prestations', 'services'],
                                ['Occasions', 'occasions'],
                                ['Avis', '#notices'],
                                ['Contact', '#contact'],
                                ['Login', 'login']
                            ],
                            '/admin' => [
                                ['Dashboard', 'admin'],
                                ['Comptes', 'employed/read'],
                                ['Prestations', 'services/read'],
                                ['Horaires', 'openTimes/read'],
                                ['Logout', '/logout']
                            ],
                            '/user' => [
                                ['Dashboard', '/user'],
                                ['Occasions', '/occasions/read'],
                                ['Avis', '/notices/read'],
                                ['Messages', '/messages/read'],
                                ['Logout', '/logout']
                            ],
                            '/login' => [
                                ['Login', '/login'],
                                ['Accueil', '/home']
                            ],
                            '/services' => [
                                ['Prestations', 'services'],
                                ['Accueil', '/home'],
                                ['Occasions', 'occasions'],
                                ['Contact', '#contact'],
                                ['Login', 'login']
                            ],
                            '/occasions' => [
                                ['Occasions', 'occasions'],
                                ['Accueil', '/home'],
                                ['Prestations', 'services'],
                                ['Contact', '#contact'],
                                ['Login', 'login']
                            ],
                            '/occasions/read' => [
                                ['Occasions', 'occasions'],
                                ['Dashboard', '/user'],
                                ['Logout', '/logout']
                            ],
                            '/occasions/create' => [
                                ['Nouveau véhicule', 'occasions'],
                                ['Dashboard', '/user'],
                                ['Logout', '/logout']
                            ],
                            '/notices/read' => [
                                ['Avis', 'avis'],
                                ['Dashboard', '/user'],
                                ['Logout', '/logout']
                            ],
                            '/notices/create' => [
                                ['Nouvel avis', 'avis'],
                                ['Dashboard', '/user'],
                                ['Logout', '/logout']
                            ],
                            '/messages/read' => [
                                ['Messages', 'messages'],
                                ['Dashboard', '/user'],
                                ['Logout', '/logout']
                            ],
                            '/employed/read' => [
                                ['Employés', '/employed/read'],
                                ['Dashboard', '/admin'],
                                ['Logout', '/logout']
                            ],
                            '/employed/create' => [
                                ['Nouvel employé', '/employed/read'],
                                ['Dashboard', '/admin'],
                                ['Logout', '/logout']
                            ],
                            '/services/read' => [
                                ['Prestations', '/services/read'],
                                ['Dashboard', '/admin'],
                                ['Logout', '/logout']
                            ],
                            '/services/create' => [
                                ['Nouvelle prestation', '/services/read'],
                                ['Dashboard', '/admin'],
                                ['Logout', '/logout']
                            ],
                            '/openTimes/read' => [
                                ['Horaires', '/openTimes/read'],
                                ['Dashboard', '/admin'],
                                ['Logout', '/logout']
                            ]
                        ];

                        foreach ($menuItems as $uri => $items) {
                            if ($request_uri === $uri) {
                                foreach ($items as $item) {
                                    echo '<li class="nav-item';
                                    echo ($uri === '/home' && $item[1] === '/home') ? ' active' : '';
                                    echo '">';
                                    echo '<a class="nav-link" href="' . $item[1] . '">' . $item[0];
                                    echo ($uri === '/home' && $item[1] === '/home') ? '<span class="sr-only">(current)</span>' : '';
                                    echo '</a></li>';
                                }
                                break;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<!-- Slider section -->
<?php
if ($_SERVER['REQUEST_URI'] === '/home' || $_SERVER['REQUEST_URI'] === '/') {
    echo '
            <section class=" slider_section ">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Votre sécurité <br>
                                                <span>
                                                    Notre Responsabilité
                                                </span>
                                            </h1>
                                            <p>
                                                Vincent Parrot considère son atelier comme un véritable lieu de confiance pour ses clients
                                                et leurs voitures doivent être entre de bonnes mains.
                                            </p>
                                            <div class="btn-box">
                                                <a href="#notices" class="btn-1"> Avis </a>
                                                <a href="#contact" class="btn-2"> Contact </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Nos prestations <br>
                                                <span>
                                                    Qualité & Confiance
                                                </span>
                                            </h1>
                                            <p>
                                                une large gamme de services: réparation de la carrosserie et de la mécanique
                                                des voitures ainsi que leur entretien.
                                            </p>
                                            <div class="btn-box">
                                                <a href="services" class="btn-1"> Voir plus </a>
                                                <a href="#contact" class="btn-2"> Contact </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Véhicules d\'Occasions <br>
                                                <span>
                                                    pleines d\'avenir
                                                </span>
                                            </h1>
                                            <p>
                                                Découvrez votre future voiture dans notre large catalogue de voitures
                                                d’occasion parfaitement reconditionnées !
                                            </p>
                                            <div class="btn-box">
                                                <a href="occasions" class="btn-1"> Acheter </a>
                                                <a href="#contact" class="btn-2"> Vendre </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container idicator_container">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/admin') {
    echo '
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-box">
                                <div class="logo">
                                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                                </div>
                                <h1>
                                    Bienvenue <br>
                                    <span>
                                    Administrateur
                                    </span>
                                </h1>
                                <h2>Voici votre 
                                    <span>
                                        Dashboard
                                    </span>
                                </h2>
                                <h3>
                                    Choisissez un élément à modifier:
                                </h3>
                                <div class="btn-box">
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="employed/read" class="btn-2 col-md-6">comptes des employés</a>
                                    </div>
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="services/read" class="btn-2 col-md-6">prestations du garage</a>
                                    </div>
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="openTimes/read" class="btn-2 col-md-6">horaires d\'ouverture du garage</a>                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/user') {
    echo '
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-box">
                                <div class="logo">
                                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                                </div>
                                <h1>
                                    Bienvenue <br>
                                    <span>
                                        Employé
                                    </span>
                                </h1>
                                <h2>Voici votre 
                                    <span>
                                        Dashboard
                                    </span>
                                </h2>
                                <h3>
                                    Choisissez un élément à modifier:
                                </h3>
                                <div class="btn-box">
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="occasions/read" class="btn-2 col-md-6">Véhicules d\'Occasions</a>
                                    </div>
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="notices/read" class="btn-2 col-md-6">Avis Clientèle</a>
                                    </div>
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="messages/read" class="btn-2 col-md-6">Les messages</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/occasions/read') {
    echo '
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-box">
                                <div class="logo">
                                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-car"></span></h1>
                                </div>
                                <h1>
                                    Véhicules d\'<br>
                                    <span>
                                    Occasions
                                    </span>
                                </h1>
                                <div class="btn-box">
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="create" class="btn-2 col-md-6">ajouter nouveau véhicule doccasion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/messages/read') {
    echo '
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-box">
                                <div class="logo">
                                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-comment"></span></h1>
                                </div>
                                <h1>
                                    Messages <br>
                                    <span>
                                    Clients
                                    </span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/occasions') {
    echo '
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="detail-box">
                                <h1>
                                    Véhicules d\'Occasions <br>
                                    <span>
                                    pleines d\'avenir
                                    </span>
                                </h1>
                                <p>Découvrez votre future voiture dans notre large catalogue
                                    de voitures d’occasion parfaitement reconditionnées !
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="contactSearchBtn">
                        <a href="#contact" class="btn-2 fa fa-search"> Nous cherchons pour vous </a>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/services') {
    echo '
            <section class=" slider_section ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-box">
                                <h1>
                                    Nos prestations <br>
                                    <span>
                                    Qualité & Confiance                                                </span>
                                </h1>
                                <div class="btn-boxServices">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    <a href="#contact" class="btn-2"> Prenez rendez-vous </a>
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/services/read') {
    echo '
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-box">
                                <div class="logo">
                                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-superpowers"></span></h1>
                                </div>
                                <h1>
                                    Table des <br>
                                    <span>
                                    Prestations 
                                    </span>
                                    du garage
                                </h1>
                                <div class="btn-box">
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="create" class="btn-2 col-md-6">ajoutez nouvel prestation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/employed/read') {
    echo '
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-box">
                                <div class="logo">
                                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                                </div>
                                <h1>
                                    Table des <br>
                                    <span>
                                    Employés
                                    </span>
                                </h1>
                                <div class="btn-box">
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="create" class="btn-2 col-md-6">ajoutez nouvel employé</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/openTimes/read') {
    echo '
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-box">
                                <div class="logo">
                                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-clock-o"></span></h1>
                                </div>
                                <h1>
                                    Heures d\'<br>
                                    <span>
                                    Ouvertures 
                                    </span>
                                    et 
                                    <span>
                                    fermetures
                                    </span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/notices/read') {
    echo '
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-box">
                                <div class="logo">
                                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-bell"></span></h1>
                                </div>
                                <h1>
                                    Avis d\'<br>
                                    <span>
                                    Utilisateurs 
                                    </span>
                                </h1>
                                <div class="btn-box">
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="create" class="btn-2 col-md-6">ajouter nouvel avis client</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
}
?>