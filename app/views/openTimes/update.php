<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Modifier les horaires du <?= $horaires['jour'] ?></h3>
        <div class="container-content">
            <form method="POST" class="margin-t" action="/openTimes/update/action">
                <input type="hidden" name="action" value="<?= $horaires['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="jour" placeholder="jour (*)" value="<?= $horaires['jour'] ?>">
                </div>
                <div class="form-group">
                    <input type="time" class="form-control" name="ouverture" placeholder="ouverture (*)" value="<?= $horaires['ouverture'] ?>">
                </div>
                <div class="form-group">
                    <input type="time" class="form-control" name="fermeture" placeholder="fermeture (*)" value="<?= $horaires['fermeture'] ?>">
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