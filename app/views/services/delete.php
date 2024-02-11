<div class="deleteContent">
    <div class="warningMessage">
        <span>Etes-vous sur de vouloir supprimer ce service <?= ucfirst($prestations['name']) ?> ?</span>
    </div>
    <form method="POST" action="/services/delete/action">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="">
            <button type="submit" class="btn btn-danger">Supprimer</button>
            <a href="/services/read" class="btn btn-default">Fermer</a>
        </div>
</div>