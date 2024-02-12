<section class="occasions_section layout_padding">
    <div class="filterBox">
        <div class="TitreFilter">
            <h4>Filtrez votre recherche</h4>
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
        <button class="btnRefreshPage" onclick="refreshPage()">Rafraîchir les filtres</button>
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
        const occasions = <?= json_encode($occasions); ?>;

        const occasionsFilteredByMultipleFields = filterByMultipleFields(occasions, data);
        const occasionsFilteredByRange = filterByRange(occasionsFilteredByMultipleFields, rangeFilters);

        carsContainer.innerHTML = '';

        carsContainer.innerHTML =
            occasionsFilteredByRange.map((occasion) => (
                `<div class="row">
                    <div class="col-md-3 px-0">
                        <div class="img_container">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="img-box">
                                            <img class="card-img" src="../../public/pictures/${occasion['modele']}.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 px-0">
                        <div class="detail-box">
                            <div class="heading_container ">
                                <h2 class="card-title">${occasion['modele']}</h2>
                            </div>
                            <h3 class="card-title">${occasion['annee']}</h3>
                            <p class="card-description">${occasion['description']}</p>
                            <p class="card-kilometre">${occasion['kilometre']} km</p>
                            <p class="card-prix">${occasion['prix']} €</p>
                        </div>
                    </div>
                    <div class="col-md-1 px-0">
                        <div class="btn-box">
                            <a href="#contact"> contactez vendeur </a>
                        </div>
                    </div>
                </div>`
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