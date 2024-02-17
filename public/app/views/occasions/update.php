<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-car"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Modifier le véhicule "<?= $occasions['modele'] ?>"</h3>
        <div class="container-content">
            <form method="POST" class="margin-t" action="/occasions/update/action" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $occasions['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="modele" placeholder="modèle (*)" value="<?= $occasions['modele'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="annee" placeholder="année (*)" value="<?= $occasions['annee'] ?>" required>
                </div>
                <div class="form-group">
                    <textarea rows="4" cols="50" class="form-control" name="description" placeholder="description du véhicule (*)" required><?= $occasions['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <select class="form-control" name="carburant" required>
                        <option value="diesel" <?= ($occasions['carburant'] == 'diesel') ? 'selected' : '' ?>>diesel</option>
                        <option value="essence" <?= ($occasions['carburant'] == 'essence') ? 'selected' : '' ?>>essence</option>
                        <option value="électrique" <?= ($occasions['carburant'] == 'électrique') ? 'selected' : '' ?>>électrique</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="kilometre" placeholder="kilométrage (*)" value="<?= $occasions['kilometre'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="ext" class="form-control" name="prix" placeholder="prix (*)" value="<?= $occasions['prix'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="photos">Ajouter des photos:</label>
                    <input type="file" class="form-control" name="photos[]" id="photos" accept="image/*" multiple>
                </div>
                <div class="form-group">
                    <label>Photos actuelles:</label>
                    <?php foreach ($photos as $photo) : ?>
                        <div class="current-photo">
                            <img src="data:image/jpeg;base64,<?= base64_encode($photo['photo']) ?>" alt="<?= $photo['nom_photo'] ?>" width="100" height="100">
                            <input type="checkbox" name="delete_photos[]" value="<?= $photo['id'] ?>"> Supprimer
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="">
                    <p class="">(*) champs obligatoires</p>
                </div>
                <button type="submit" class="form-button button-l margin-b">Sauvegarder</button>
                <button type="button" class="form-button button-l margin-b" onclick="goBack()">Annuler</button>
            </form>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
