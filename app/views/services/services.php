<section class="prestations_section layout_padding">
    <div class="container">
        <?php foreach ($prestations as $prestation) : ?>
            <div class="row">
                <div class="col-md-3 px-0">
                    <div class="img_container">
                        <div class="img-box">
                            <img class="card-img" src="../../public/pictures/<?= $prestation['name'] ?>.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-9 px-0">
                    <div class="detail-box">
                        <div class="heading_container ">
                            <h1 class="card-title"><?= $prestation['name'] ?></h1>
                            <p class="card-text"><?= $prestation['description'] ?></p>
                            <div class="cardBottom">
                                <div class="cardPrice">
                                    <p class="card-bottom">à partir de : <?= $prestation['price'] ?>€</p>
                                </div>
                                <div class="btn-box">
                                    <a href="#contact" class="btn-2 contact-btn" data-service="<?= $prestation['name'] ?>"> Contact </a>
                                </div>
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
                    <form method="POST" class="margin-t" action="/messages/add">
                        <input type="hidden" name="action" value="addMessages">
                        <div class="contact_form-container">
                            <div>
                                <div>
                                    <input type="text" class="form-control" name="name" placeholder="Prénom (*)" value="" required />
                                </div>
                                <div>
                                    <input type="text" class="form-control" name="lastname" placeholder="Nom (*)" value="" required />
                                </div>
                                <div>
                                    <input type="email" class="form-control" name="email" placeholder="Email (*)" value="" required />
                                </div>
                                <div>
                                    <input type="text" class="form-control" name="telephone" placeholder="Numéro de téléphone" />
                                </div>
                                <div>
                                    <input type="text" class="form-control" name="sujet" placeholder="Sujet du message" />
                                </div>
                                <select class="form-control" name="service" id="service-select">
                                    <option value="">--Quel service voulez-vous contacter?--</option>
                                    <?php foreach ($prestations as $prestation) : ?>
                                        <option value="<?= $prestation['name'] ?>" class="service-option"><?= $prestation['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div>
                                    <textarea rows="4" cols="50" type="textarea" class="form-control" placeholder="message" class="message_input" name="message"></textarea>
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