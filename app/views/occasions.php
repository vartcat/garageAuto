<section class="occasions_section layout_padding">
    <div class="container">
        <?php foreach ($occasions as $occasion) : ?>
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="img_container">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="img-box">
                                        <img class="card-img" src="../../public/pictures/<?= $occasion['modele'] ?>.jpg" alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-box">
                                        <img class="card-img" src="../../public/pictures/v5.jpg" alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-box">
                                        <img class="card-img" src="../../public/pictures/v7.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel_btn-box">
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="detail-box">
                        <div class="heading_container ">
                            <h2 class="card-title"><?= $occasion['modele'] ?></h2>
                        </div>
                        <h3 class="card-title"><?= $occasion['annee'] ?></h3>
                        <p class="card-text"><?= $occasion['description'] ?></p>
                        <p class="card-text">
                            <?= $occasion['kilometre'] ?> km</p>
                        <p class="card-text">
                            <?= $occasion['prix'] ?> €</p>
                        <div class="btn-box">
                            <a href="#contact"> contactez vendeur </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- contact section -->
<section class="contact_section layout_padding">
    <div id="contact" class="contact_bg_box">
    </div>
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Vous recherchez un modèle en particulier ?<br>
                Demandez-nous
            </h2>
        </div>
        <div class="">
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <form action="#">
                        <div class="contact_form-container">
                            <div>
                                <div>
                                    <input type="text" placeholder="Nom & Prénom" />
                                </div>
                                <div>
                                    <input type="email" placeholder="Email" />
                                </div>
                                <div>
                                    <input type="text" placeholder="téléphone" />
                                </div>
                                <div class="">
                                    <input type="text" placeholder="Décrivez-nous le modèle de voiture que vous recherchez" class="message_input" />
                                </div>
                                <div class="btn-box ">
                                    <button type="submit">
                                        Envoyer demande
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>