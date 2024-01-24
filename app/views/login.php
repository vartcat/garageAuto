<body class="main-bg">
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Identifiez-vous</h3>
        <p class="text-whitesmoke">Accessible uniquement aux membres de l'équipe du garage</p>
        <div class="container-content">
            <div class="error-text">
                <?php
                    echo isset($_SESSION['error']) ? $_SESSION['error'] : '';
                ?>
            </div>
            <form method="POST" class="margin-t" action="/login/auth">
                <input type="hidden" name="action" value="authenticate">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="*****" required="">
                </div>
                <button type="submit" class="form-button button-l margin-b">Login</button>
            </form>
        </div>
    </div>
    <script src="js/custom.js"></script>
</body>
