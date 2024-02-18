<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-superpowers"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Modifier la prestation ' <?= $prestations['name'] ?> '</h3>
        <div class="container-content">
            <form method="POST" class="margin-t" action="/services/update/action" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $prestations['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="nom du service (*)" value="<?= $prestations['name'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="textarea" class="form-control" name="description" placeholder="description (*)" value="<?= $prestations['description'] ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="price" placeholder="prix (*)" value="<?= $prestations['price'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="photo">Ajouter la photo:</label>
                    <input type="file" class="form-control" name="photo" id="photo" accept="image/*" maxlength="5242880">
                </div>
                <div class="form-group">
                    <label>Photos actuelles:</label>
                    <div class="current-photo">
                        <img src="<?= $prestations['photo'] ?>" alt="<?= $prestations['name'] ?>" width="100" height="100">
                        <input type="checkbox" name="delete_photos" value="<?= $prestations['photo'] ?>"> Supprimer
                    </div>
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
