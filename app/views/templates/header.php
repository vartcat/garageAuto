<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Garage V.Parrot</title>
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
    <link href="../../public/css/login.css" rel="stylesheet" />
    <link href="../../public/css/employedCrud.css" rel="stylesheet" />
    <link href="../../public/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../../public/css/style.css" rel="stylesheet" />
    <link href="../../public/css/responsive.css" rel="stylesheet" />
</head>
<?php
if (strpos($_SERVER['REQUEST_URI'], 'home') !== false || $_SERVER['REQUEST_URI'] === '/') {
    echo '
        <div class="hero_area">
        <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="public/pictures/garage4.jpg">
                </div>
            </div>
    ';
}
?>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Accueil<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services">Prestations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="occasions">Occasions</a>
                        </li>
                        <?php
                        if (strpos($_SERVER['REQUEST_URI'], 'home') !== false || $_SERVER['REQUEST_URI'] === '/') {
                            echo
                            '<li class="nav-item">
                                                <a class="nav-link" href="#notices">Avis</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#contact">Contact</a>
                                            </li>';
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================End Header Menu Area =================-->

<!-- slider section -->
<?php
    if (strpos($_SERVER['REQUEST_URI'], 'home') !== false || $_SERVER['REQUEST_URI'] === '/') {
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
                                                <a href="" class="btn-1"> Avis </a>
                                                <a href="" class="btn-2"> Contact </a>
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
                                                <a href="" class="btn-1"> Voir plus </a>
                                                <a href="" class="btn-2"> Contact </a>
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
                                                <a href="" class="btn-1"> Acheter </a>
                                                <a href="" class="btn-2"> Vendre </a>
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
        </div>
        ';
    }
?>
