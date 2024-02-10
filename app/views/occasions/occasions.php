<section class="occasions_section layout_padding">
    <div id="slider">
        <?php include_once "../app/views/templates/kilometersSlider.html"; ?>
    </div>
    <div id="sliderPrice">
        <?php include_once "../app/views/templates/pricesSlider.html"; ?>
    </div>
    <div>
        <select class="filters" name="carburant" id="carburant">
            <option value="null"> - séléctionner l'énergie - </option>
            <option value="diesel">diesel</option>
            <option value="essence">essence</option>
            <option value="électrique">électrique</option>
        </select>
    </div>
    <div>
        <select class="filters" name="boite" id="boite">
            <option value="null"> - séléctionner la boîte - </option>
            <option value="automatique">automatique</option>
            <option value="manuelle">manuelle</option>
        </select>
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
                    <div class="col-md-6 px-0">
                        <div class="img_container">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="img-box">
                                            <img class="card-img" src="../../public/pictures/${occasion['modele']}.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="img-box">
                                            <img class="card-img" src="../../public/pictures/${occasion['modele']}1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="img-box">
                                            <img class="card-img" src="../../public/pictures/${occasion['modele']}2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="img-box">
                                            <img class="card-img" src="../../public/pictures/${occasion['modele']}3.jpg" alt="">
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
                                <h2 class="card-title">${occasion['modele']}</h2>
                            </div>
                            <h3 class="card-title">${occasion['annee']}</h3>
                            <p class="card-text">${occasion['description']}</p>
                            <p class="card-text">${occasion['kilometre']} km</p>
                            <p class="card-text">${occasion['prix']} €</p>
                            <div class="btn-box">
                                <a href="#contact"> contactez vendeur </a>
                            </div>
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
            rangeFilters[type] = { min: fromPriceSlider.valueAsNumber, max: toPriceSlider.valueAsNumber };

            render();
        }));

        render();
    }

    updateData();
</script>
