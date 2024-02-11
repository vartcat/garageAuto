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
    <link href="../../public/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../../public/css/responsive.css" rel="stylesheet" />
</head>
<?php
if (strpos($_SERVER['REQUEST_URI'], '/home') !== false || $_SERVER['REQUEST_URI'] === '/') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="public/pictures/garage4.jpg">
                </div>
            </div>
        
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/admin') {
    echo '
            <div class="hero_area">
            <!-- header section strats -->
                <div class="hero_bg_box">
                    <div class="img-box">
                        <img src="/public/pictures/garageEnseigne.jpg">
                    </div>
                </div>
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/user') {
    echo '
            <div class="hero_area">
            <!-- header section strats -->
                <div class="hero_bg_box">
                    <div class="img-box">
                        <img src="/public/pictures/garageEnseigne.jpg">
                    </div>
                </div>
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/services') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                </div>
            </div>
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/occasions') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                </div>
            </div>
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/occasions/read') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="/public/pictures/occasions.jpg">
                </div>
            </div>
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/messages/read') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="/public/pictures/message.jpg">
                </div>
            </div>
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/employed/read') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="/public/pictures/employed.jpg">
                </div>
            </div>
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/notices/read') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="/public/pictures/avis.jpg">
                </div>
            </div>
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/services/read') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="/public/pictures/mécanique.jpg">
                </div>
            </div>
    ';
} elseif ($_SERVER['REQUEST_URI'] === '/openTimes/read') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="/public/pictures/garage.jpg">
                </div>
            </div>
    ';
}
?>

<!-- Header section -->
<header class="header_section">
    <div class="header_top">
        <div class="container-fluid">
            <div class="contact_link-container">
                <a href="" class="contact_link1">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span>
                        1 rue du garage, 31000 Toulouse
                    </span>
                </a>
                <a href="" class="contact_link2">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        Tél : +01 1234567890
                    </span>
                </a>
                <a href="" class="contact_link3">
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
                <a class="navbar-brand" href="index.html">
                    <span>
                        Garage V.Parrot
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>
                <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <?php
                        if ($_SERVER['REQUEST_URI'] === '/home' || $_SERVER['REQUEST_URI'] === '/') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="/home">Accueil<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="services">Prestations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="occasions">Occasions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#notices">Avis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                            </li>';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/admin') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="admin">Dashboard<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="employed/read">comptes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="services/read">prestations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="openTimes/read">horaires</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/user') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="/user">Dashboard<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/occasions/read">Occasions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/notices/read">Avis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/messages/read">Messages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/login') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="/login">Login<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/home">Accueil</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/services') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="services">Prestations<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="home">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="occasions">Occasions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                            </li>';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/occasions') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="occasions">Occasions<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="home">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="services">Prestations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                            </li>';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/occasions/read') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="occasions">Occasions<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/occasions/create') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="occasions">Nouveau véhicule<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/notices/read') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="avis">Avis<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/notices/create') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="occasions">Nouvel avis<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/messages/read') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="messages">Messages<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/employed/read') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="/employed/read">Employés<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/employed/create') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="/employed/read">Nouvel employé<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/services/read') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="/services/read">Prestations<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/services/create') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="/services/read">Nouvel préstation<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
                        }
                        elseif ($_SERVER['REQUEST_URI'] === '/openTimes/read') {
                            echo
                            '
                            <li class="nav-item active">
                                <a class="nav-link" href="/openTimes/read">Horaires<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                            ';
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
                        <div class="col-md-7">
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
    echo'
            <section class="slider_section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
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
}elseif ($_SERVER['REQUEST_URI'] === '/occasions/read') {
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
            <section class="slider_section ">
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
                                <h2>Découvrez votre future voiture dans notre large catalogue
                                    de voitures d’occasion parfaitement reconditionnées !
                                </h2>
                                <div class="btn-box">
                                    <a href="#contact" class="btn-2"> Nous cherchons pour vous </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
} elseif ($_SERVER['REQUEST_URI'] === '/services') {
    echo '
            <section class=" slider_section ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="detail-box">
                                <h1>
                                    Nos prestations <br>
                                    <span>
                                    Qualité & Confiance                                                </span>
                                </h1>
                                <div class="btn-box">
                                    <a href="#contact" class="btn-2"> Prenez rendez-vous </a>
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
                                <div class="btn-box">
                                    <div class="btn-crud">
                                        <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                                        <a href="update" class="btn-2 col-md-6">modifier les horaires</a>
                                    </div>
                                </div>
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