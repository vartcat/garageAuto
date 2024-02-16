<div class="validateContent">
    <div class="validateMessage">
        <span>Etes-vous sur de vouloir valider l'avis de <?= ucfirst($avis['name']) ?> ?</span>
        <span>Cet avis sera afficher sur la page d'accueil</span>
    </div>
    <form method="POST" action="/notices/validate/action">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="">
            <button type="submit" class="btn btn-success">Valider</button>
            <a href="/notices/read" class="btn btn-default">Fermer</a>
        </div>
</div>