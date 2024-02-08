<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Ajoutez nouvel avis client</h3>
        <div class="container-content">
            <form method="POST" class="margin-t" action="/notices/create/add">
                <input type="hidden" name="action" value="addNotices">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="prénom (*)" value="" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lastname" placeholder="nom (*)" value="" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="email@example.com (*)" value="" required>
                </div>
                <div class="form-group">
                    <input type="textarea" class="form-control" name="avis" placeholder="avis (*)" value="" required>
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