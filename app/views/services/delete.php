<div class="" id="">
    <div class="">
        <div class="">
            <div class="">
                <h4 class="">Supprimer services</h4>
            </div>
            <div class="">

            <span>Etes-vous sur de vouloir supprimer ce service <?= ucfirst($services['name']) ?> ?</span>
            </div>
            <form method="POST" action="/services/delete/action">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="">
                <button type="submit" class="btn btn-danger">Supprimer</button>
                <a href="/services/read" class="btn btn-default">Fermer</a>
            </div>
        </div>
    </div>
</div>
