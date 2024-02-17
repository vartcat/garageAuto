<div class="container">
    <div class="deleteContent">
        <div class="warningMessage">
            <span>Etes-vous sûr de vouloir vous déconnecter ?</span>
        </div>
        <form method="POST" action="/logout/logout">
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Déconnexion</button>
                <button type="button" class="btn btn-default" onclick="goBack()">Annuler</button>
            </div>
        </form>
    </div>
</div>

<script>
function goBack() {
    window.history.back();
}
</script>
