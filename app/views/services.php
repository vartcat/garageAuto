<body>
    <section class="slider_section">
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
    </section>
    <h1>Liste des prestations du garage V.PARROT :</h1>
    <div class="row">
        <?php foreach ($prestations as $prestation) : ?>
            <div class="column">
                <div class="card">
                    <img src="../../public/pictures/<?= $prestation['name'] ?>.jpg" alt="" style="width:100%">
                    <h1 class="card-title"><?= $prestation['name'] ?></h1>
                    <p class="card-text"><?= $prestation['description'] ?></p>
                    <p class="card-bottom">à partir de : <?= $prestation['price'] ?>€</p>
                    <a href="#contact" class="btn-2"> Contact </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

<!-- contact section -->

<section class="contact_section layout_padding">
    <div id="contact" class="contact_bg_box">
    </div>
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Besoin d'informations ou d'un RDV ?<br>
                Entrez en contact
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
                                    <input type="text" placeholder="Numéro de téléphone" />
                                </div>
                                <select name="services" id="service-select">
                                    <option value="">--Quel service voulez-vous contacter?--</option>
                                    <?php foreach ($prestations as $prestation) : ?>
                                        <option value="name"><?= $prestation['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="">
                                    <input type="text" placeholder="Message" class="message_input" />
                                </div>
                                <div class="btn-box ">
                                    <button type="submit">
                                        Envoyer
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


<h1>Liste services garage</h1>