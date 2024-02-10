<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-car"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Ajoutez nouvelle occasion</h3>
        <div class="container-content">
            <?php
            ?>
            <form enctype="multipart/form-data" method="POST" class="margin-t" action="/occasions/create/add">
                <input type="hidden" name="action" value="addOccasions">
                <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                <input type="file" name="fic" size=50 />
                <div class="form-group">
                    <input type="text" class="form-control" name="modele" placeholder="modèle (*)" value="" required>
                </div>
                <div class="form-group">
                    <input type="year" class="form-control" name="annee" placeholder="année (*)" value="" required>
                </div>
                <div class="form-group">
                    <select type="text" class="form-control" name="boite" placeholder="boite(*)" value="" required>
                        <option value="employed">automatique</option>
                        <option value="admin">manuelle</option>
                </div>
                <div class="form-group">
                    <textarea rows="4" cols="50" type="textarea" class="form-control" name="description" placeholder="description du véhicule (*)" value="" required></textarea>
                </div>
                <div class="form-group">
                    <select type="text" class="form-control" name="carburant" placeholder="carburant(*)" value="" required>
                        <option value="diesel">diesel</option>
                        <option value="essence">essence</option>
                        <option value="électrique">électrique</option>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="kilometre" placeholder="kilométrage (*)" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="prix" placeholder="prix (*)" required>
                </div>
                <div class="">
                    <p class="">(*) champs obligatoires</p>
                </div>
                <button type="submit" class="form-button button-l margin-b">Sauvegarder</button>
            </form>
        </div>
    </div>
</body>
<script src="js/custom.js"></script>