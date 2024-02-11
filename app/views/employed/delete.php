<div class="deleteContent">
    <div class="warningMessage">
        <span>Etes-vous sur de vouloir supprimer le compte de <?= ucfirst($user['name']) ?> ?</span>
    </div>
    <form method="POST" action="/employed/delete/action">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="">
            <button type="submit" class="btn btn-danger">Supprimer</button>
            <a href="/employed/read" class="btn btn-default">Fermer</a>
        </div>
    </form>
</div>