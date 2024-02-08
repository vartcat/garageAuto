<div class="" id="">
    <div class="">
        <div class="">
            <div class="">
                <h4 class="">Supprimer ce véhicule</h4>
            </div>
            <div class="">

            <span>Etes-vous sur de vouloir supprimer le véhicule d'occasion <?= ucfirst($occasions['modele']) ?> ?</span>
            </div>
            <form method="POST" action="/occasions/delete/action">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="">
                <button type="submit" class="btn btn-danger">Supprimer</button>
                <a href="/occasions/read" class="btn btn-default">Fermer</a>
            </div>
        </div>
    </div>
</div>