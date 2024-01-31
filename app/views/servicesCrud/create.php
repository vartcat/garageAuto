<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-superpowers"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Ajoutez nouvel prestation</h3>
        <div class="container-content">
            <form method="POST" class="margin-t" action="/servicesCrud/create/add">
                <input type="hidden" name="action" value="addServices">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="nom du nouveau service (*)" value="" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="description" placeholder="description (*)" value="" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="price" placeholder="prix (*)" value="" required>
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