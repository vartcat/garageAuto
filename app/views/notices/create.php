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
                    <textarea rows="4" cols="50" type="textarea" class="form-control" name="avis" placeholder="avis (*)" value="" required></textarea>
                </div>
                <div class="form-group">
                    <div class="form-control-select-note">
                        <label class="fa fa-star"> Notez votre garage:</label>
                        <select name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <p class="note-max">/5</p>
                    </div>
                    <div class="form-group">
                        <p class="">(*) champs obligatoires</p>
                    </div>
                    <button type="submit" class="form-button button-l margin-b">Sauvegarder</button>
                    <button type="button" class="form-button button-l margin-b" onclick="goBack()">Annuler</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>