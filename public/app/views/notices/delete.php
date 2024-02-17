<div class="deleteContent">
    <div class="warningMessage">
        <span>Etes-vous sur de vouloir supprimer l'avis de <?= ucfirst($data['name']) ?> ?</span>
    </div>
    <form method="POST" action="/notices/delete/action">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="">
            <button type="submit" class="btn btn-danger">Supprimer</button>
            <a href="/notices/read" class="btn btn-default">Fermer</a>
        </div>
</div>
