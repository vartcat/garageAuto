<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-superpowers"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Ajoutez nouvelle prestation</h3>
        <div class="container-content">
            <form method="POST" class="margin-t" action="/services/create/add" enctype="multipart/form-data">
                <input type="hidden" name="action" value="addServices">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nom du nouveau service (*)" value="" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="description" placeholder="Description (*)" value="" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="price" placeholder="Prix (*)" value="" required>
                </div>
                <div class="form-group">
                    <label for="photo">Télécharger une photo (max 5 Mo) :</label>
                    <input type="file" class="form-control" name="photo" id="photo" accept="image/*" maxlength="5242880" required>
                    <!-- 5 Mo = 5 * 1024 * 1024 = 5242880 octets -->
                </div>
                <div class="">
                    <p class="">(*) champs obligatoires</p>
                </div>
                <button type="submit" class="form-button button-l margin-b">Sauvegarder</button>
            </form>
        </div>
    </div>
</body>
