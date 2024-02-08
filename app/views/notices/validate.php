<div class="" id="">
    <div class="">
        <div class="">
            <div class="">
                <h4 class="">Validation avis client</h4>
            </div>
            <div class="">

            <span>Etes-vous sur de vouloir valider l'avis de <?= ucfirst($notice['name']) ?> ?</span>
            </div>
            <form method="POST" action="/notices/validate/action">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="">
                <button type="submit" class="btn btn-success">Valider</button>
                <a href="/notices/read" class="btn btn-default">Fermer</a>
            </div>
        </div>
    </div>
</div>
