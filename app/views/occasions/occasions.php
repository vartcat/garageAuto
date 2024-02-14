<body>
    <!-- filter section -->

    <section class="occasions_section layout_padding">
        <div class="filterBox">
            <div class="TitreFilter">
                <h4>Filtrez votre recherche parmis nos véhicules</h4>
            </div>
            <div class="sliderContent">
                <div id="slider">
                    <h6> - kilométrage - </h6>
                    <?php include_once "../app/views/templates/kilometersSlider.html"; ?>
                </div>
                <div id="sliderPrice">
                    <h6> - prix - </h6>
                    <?php include_once "../app/views/templates/pricesSlider.html"; ?>
                </div>
            </div>
            <div class="filtersContent">
                <div class="filterListEnergie">
                    <h6> - énergie - </h6>
                    <select class="filters" name="carburant" id="carburant">
                        <option value="null"> - séléctionner l'énergie - </option>
                        <option value="diesel">diesel</option>
                        <option value="essence">essence</option>
                        <option value="électrique">électrique</option>
                    </select>
                </div>
                <div class="RefressPage">
                    <button class="btnRefreshPage" onclick="refreshPage()">Rafraîchir les filtres</button>
                </div>
                <div class="filterListBoite">
                    <h6> - boîte - </h6>
                    <select class="filters" name="boite" id="boite">
                        <option value="null"> - séléctionner la boîte - </option>
                        <option value="automatique">automatique</option>
                        <option value="manuelle">manuelle</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="container" id="cars-container"></div>
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
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="role" placeholder="sujet">
                                            <option value="search">recherche de voiture</option>    
                                            <option value="rdv">prendre un rendez-vous</option>
                                            <option value="tryCar">essayer la voiture</option>
                                            <option value="soldCar">vendre sa voiture</option>
                                            <option value="byCar">acheter la voiture</option>
                                            <option value="NeedInfo">besoin d'informations</option>
                                        </select>
                                    </div>
                                    <div>
                                        <textarea rows="4" cols="50" type="textarea" class="form-control" placeholder="Décrivez-nous la voiture de vos rêves ici ..." class="message_input" name="message"></textarea>
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

    <!-- content filtered section -->

    <script>
        const data = {
            carburant: null,
            boite: null,
        };
        const rangeFilters = {
            kilometre: {
                min: Number(document.getElementById('fromSlider').value),
                max: Number(document.getElementById('toSlider').value)
            },
            prix: {
                min: Number(document.getElementById('fromPriceSlider').value),
                max: Number(document.getElementById('toPriceSlider').value)
            },
        };

        function filterByMultipleFields(occasions, filters) {
            const excludedItems = Object.entries(filters).filter(([, value]) => value);
            return occasions.filter(occasion => excludedItems.every(([key, value], index) => occasion[key] === value));
        }

        function filterByRange(occasions, filters) {
            return occasions.filter(occasion => Object.entries(filters).every(([key, value], index) => (
                Number(occasion[key]) >= value.min && Number(occasion[key]) <= value.max
            )));
        }

        function render() {
            const carsContainer = document.getElementById('cars-container');
            const occasionsFilteredByRange = filterByRange(<?= json_encode($occasions) ?>, rangeFilters);

            carsContainer.innerHTML = '';

            carsContainer.innerHTML = occasionsFilteredByRange.map((occasion) => (
                `
            <?php foreach ($occasions as $occasion) : ?>
            <div class="row">
                <div class="col-md-3 px-0 h100px">
                    <div class="img_container">
                        <div id="carouselExampleControls<?= $occasion['id'] ?>" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                // Récupération des photos pour cette occasion
                                $photos = $this->get_photos_by_occasion_id($occasion['id']);
                                foreach ($photos as $key => $photo) : ?>
                                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                                        <img src="data:image/jpeg;base64,<?= base64_encode($photo['photo']) ?>" class="d-block w-100" alt="Photo <?= $key + 1 ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls<?= $occasion['id'] ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls<?= $occasion['id'] ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 px-0">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2 class="card-title"><?= $occasion['modele'] ?></h2>
                        </div>
                        <h3 class="card-title"><?= $occasion['annee'] ?></h3>
                        <p class="card-description"> - <?= ucfirst($occasion['description']) ?></p>
                        <p class="card-carburant"> - <?= ucfirst($occasion['carburant']) ?></p>
                        <p class="card-boite"> - <?= ucfirst($occasion['boite']) ?></p>
                        <div class="footing_container">
                            <p class="card-kilometre"><?= $occasion['kilometre'] ?> km</p>
                            <p class="card-prix"><?= $occasion['prix'] ?> €</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 px-0">
                    <div class="btn-box">
                        <a href="#contact" class="contact-seller-btn" data-occasion="<?= htmlspecialchars(json_encode($occasion), ENT_QUOTES, 'UTF-8') ?>"> contactez vendeur </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            `
            )).join('');
        }


        function updateData() {
            const filters = document.querySelectorAll('.filters');
            const filtersRange = document.querySelectorAll('.filtersRange');

            filters.forEach(filter => filter.addEventListener('change', (e) => {
                const value = e.target.value;
                const type = e.target.getAttribute('name');
                data[type] = value;
                render();
            }));

            filtersRange.forEach(filter => filter.addEventListener('change', (e) => {
                const type = e.target.getAttribute('name');
                rangeFilters[type] = {
                    min: fromPriceSlider.valueAsNumber,
                    max: toPriceSlider.valueAsNumber
                };
                render();
            }));

            render();
        }

        updateData();
    </script>
    <script>
        function refreshPage() {
            location.reload(); // Cette fonction actualise la page
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const contactSellerButtons = document.querySelectorAll('.contact-seller-btn');
            const textarea = document.querySelector('textarea[name="message"]');

            contactSellerButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const occasionData = JSON.parse(this.getAttribute('data-occasion'));
                    const description = occasionData.modele + ', ' + occasionData.annee + '\n' +
                        'Description: ' + occasionData.description + '\n' +
                        'Carburant: ' + occasionData.carburant + '\n' +
                        'Boite: ' + occasionData.boite + '\n' +
                        'Kilométrage: ' + occasionData.kilometre + ' km\n' +
                        'Prix: ' + occasionData.prix + ' €';
                    textarea.value = description;
                });
            });
        });
    </script>
    <script src="/public/js/filterCars.js"></script>
</body>