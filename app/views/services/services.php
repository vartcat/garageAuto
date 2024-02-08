<section class="prestations_section layout_padding">
    <div class="container">
        <?php foreach ($prestations as $prestation) : ?>
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="img_container">
                        <div class="img-box">
                            <img class="card-img" src="../../public/pictures/<?= $prestation['name'] ?>.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="detail-box">
                        <div class="heading_container ">
                            <h1 class="card-title"><?= $prestation['name'] ?></h1>
                            <p class="card-text"><?= $prestation['description'] ?></p>
                            <p class="card-bottom">à partir de : <?= $prestation['price'] ?>€</p>
                            <div class="btn-box">
                                <a href="#contact" class="btn-2"> Contact </a>
                            </div>
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