<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-car"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Modifier le véhicule "<?= $occasions['modele'] ?>"</h3>
        <div class="container-content">
            <form method="POST" class="margin-t" action="/occasions/update/action">
                <input type="hidden" name="action" value="<?= $occasions['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="modele" placeholder="modèle (*)" value="<?= $occasions['modele'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="year" class="form-control" name="annee" placeholder="année (*)" value="<?= $occasions['annee'] ?>" required>
                </div>
                <div class="form-group">
                    <textarea rows="4" cols="50" type="textarea" class="form-control" name="description" placeholder="description du véhicule (*)" value="<?= $occasions['description'] ?>" required></textarea>
                </div>
                <div class="form-group">
                    <select type="text" class="form-control" name="carburant" placeholder="carburant(*)" value="<?= $occasions['carburant'] ?>" required>
                        <option value="employed">diesel</option>
                        <option value="admin">essence</option>
                        <option value="admin">électrique</option>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="kilometre" placeholder="kilométrage (*)" value="<?= $occasions['kilometre'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="prix" placeholder="prix (*)" value="<?= $occasions['prix'] ?>" required>
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