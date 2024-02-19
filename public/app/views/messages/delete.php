<div class="deleteContent">
    <div class="warningMessage">
        <span>Etes-vous sur de vouloir supprimer le message de ' <?= ucfirst($messages['name']) ?> ' ?</span>
    </div>
    <form method="POST" action="/messages/delete/action">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="">
            <button type="submit" class="btn btn-danger">Supprimer</button>
            <a href="/messages/read" class="btn btn-default">Fermer</a>
        </div>
    </form>
</div>