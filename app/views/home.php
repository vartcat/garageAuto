<body>
    <!-- about section -->
    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="public/pictures/garage.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="detail-box">
                        <div class="heading_container ">
                            <h2>
                                Qui sommes-nous?
                            </h2>
                        </div>
                        <p>
                            Vincent Parrot, fort de ses 15 années d'expérience dans la réparation automobile,
                            a ouvert son propre garage à Toulouse en 2021.
                            Depuis 2 ans, il propose une large gamme de services: réparation de la carrosserie
                            et de la mécanique des voitures ainsi que leur entretien régulier
                            pour garantir leur performance et leur sécurité.
                            Récemment la vente de voitures d'occasions garanties et révisées.
                        </p>
                        <div class="btn-box">
                            <a href="services">
                                -> Voir nos prestations
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- service section -->
    <section class="service_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Nos services
                </h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box ">
                        <div class="detail-box">
                            <h6>
                                Entretien toutes marques
                            </h6>
                            <p>
                                Depuis plus de 15 ans, notre maison effectue l’entretien de véhicules de toutes les marques.<br>
                                Cet entretien professionnel comprend, entre autres :<br>
                                - Remplacement de freins, pneus, embrayage, courroie de distribution, boîte de vitesses…<br>
                                - Vidange<br>
                                - Diagnostic moteur<br>
                                - Réparation boîtes de vitesse automatiques et manuelles<br>
                                - … </p>
                            <a href="services">
                                Voir plus
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box ">
                        <div class="detail-box">
                            <h6>
                                Contrôles & Révisions
                            </h6>
                            <p>
                                Si votre véhicule doit passer un contrôle ou une révision, nous le préparons si
                                parfaitement qu’il ne restera aucun problème à noter.
                                Faites confiance à notre expérience pour la préparation de votre voiture
                                au contrôle technique. </p>
                            <a href="services">
                                Voir plus
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box ">
                        <div class="detail-box">
                            <h6>
                                Service carrosserie
                            </h6>
                            <p>
                                Le Garage V.Parrot est également agréé toutes marques en matière de carrosserie.
                                Donc, si vous avez eu un accrochage ou un accident plus grave, confiez-nous votre véhicule.
                                Nous en prenons soin comme s’il s’agissait de notre propre voiture.
                                Pour toutes vos questions, n’hésitez pas à nous contacter. </p>
                            <a href="services">
                                Voir plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- client section -->
    <section class="client_section layout_padding">
        <div id="notices" class="container">
            <div class="heading_container heading_center">
                <h2>
                    Avis de nos clients
                </h2>
            </div>
            <!-- Début de la div subtitle pour le total des avis -->
            <div class="subtitle">
                <p>Total des avis : <span style="color: #f1db25; font-size: 2em;">
                        <?php
                        // Calcul du nombre total de notices
                        $total_notices = 0;
                        foreach ($notices as $notice) {
                            if ($notice['status'] == 'validate') {
                                $total_notices++;
                            }
                        }
                        echo $total_notices;
                        ?>
                    </span></p>
            </div>
            <!-- Fin de la div subtitle -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    foreach ($notices as $index => $notice) {
                        if ($notice['status'] == 'validate') {
                            echo "<div class='carousel-item" . ($index == 0 ? " active" : "") . "'>
                                <div class='box'>
                                    <div class='detail-box'>";
                            echo " <h4>" . $notice['name'] . " " . $notice['lastname'] . "</h4>
                                            <p>" . $notice['avis'] . "</p>
                                    </div>
                                    <div style='display:flex;'>";
                            for ($i = 0; $i < 5; $i++) {
                                echo "<i class='fa fa-star' style='color:" . ($i < intval($notice['note']) ? "#f1db25;" : "") . "'></i>";
                            }
                            echo "</div>
                                        <p>" . $notice['note'] . " / 5</p>
                                    </div>
                                </div>";
                        }
                    }
                    ?>

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
    </section>

    <!-- team section -->
    <section class="team_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Notre équipe
                </h2>
                <p>
                    Votre véhicule est entre de bonnes mains dans notre garage.<br>
                    Nos techniciens détiennent les connaissances nécessaires
                    à la prise en main de voitures de toutes les marques.
                </p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 mx-auto ">
                    <div class="box">
                        <div class="img-box">
                            <img src="public/pictures/équipe2.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Denny Butler
                            </h5>
                            <h6 class="">
                                technicien
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mx-auto ">
                    <div class="box">
                        <div class="img-box">
                            <img src="public/pictures/équipe4.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Martin Anderson
                            </h5>
                            <h6 class="">
                                superviseur
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mx-auto ">
                    <div class="box">
                        <div class="img-box">
                            <img src="public/pictures/équipe3.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Nathan Martin
                            </h5>
                            <h6 class="">
                                carrossier
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- notices section -->
    <section class="notices_section layout_padding">
        <div class="notices_bg_box">
        </div>
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Partagez votre expérience
                </h2>
                <h3> Votre avis nous est précieux !
                </h3>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-7 mx-auto">
                        <form method="POST" class="margin-t" action="/notices/create/add">
                            <input type="hidden" name="action" value="addNotices">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="prénom (*)" value="" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastname" placeholder="nom" value="">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="email@example.com (*)" value="" required>
                            </div>
                            <div class="form-group">
                                <textarea rows="4" cols="50" type="textarea" class="form-control" name="avis" placeholder="votre avis ici ..." value=""></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-control-select-note">
                                    <label class="fa fa-star"> Notez votre garage:</label>
                                    <select name="rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <p class="note-max">/5</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="">(*) champs obligatoires</p>
                            </div>
                            <div class="btn-box ">
                                <button type="submit">Partagez</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
