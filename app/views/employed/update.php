<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Modifier employé <?= $user['name'] ?></h3>
        <div class="container-content">
            <form method="POST" class="margin-t" action="/employed/update/action">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="prénom (*)" value="<?= $user['name'] ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lastname" placeholder="nom (*)" value="<?= $user['lastname'] ?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="email@example.com (*)" value="<?= $user['email'] ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="**** (*)" value="<?= $user['password'] ?>">
                </div>
                <div class="form-group">
                    <select type="text" class="form-control" name="role" placeholder="rôle (*)" value="<?= $user['role'] ?>">
                        <option value="employed">employé</option>
                        <option value="admin">admin</option>
                    </select>
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