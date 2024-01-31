<h1>Liste des employés à ce jour :</h1>

<div class="col-sm-12">
    <a href="create" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Ajouter nouvel employé</span></a>
</div>
<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">modèle</th>
            <th scope="col">année</th>
            <th scope="col">description</th>
            <th scope="col">carburant</th>
            <th scope="col">kilométrage</th>
            <th scope="col">rôle</th>
            <th scope="col">prix</th>
            <th scope="col">action</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($occasions as $occasion) : ?>
            <tr>
                <td><?= $occasion['id'] ?></td>
                <td><?= $occasion['model'] ?></td>
                <td><?= $occasion['description'] ?></td>
                <td><?= $occasion['carburant'] ?></td>
                <td><?= $occasion['kilometre'] ?></div></td>
                <td><?= $occasion['prix'] ?></td>
                <td>
                    <a href="update/<?= urlencode($user['id']) ?>" class="edit"><i class="material-icons">&#xE254;</i></a>
                    <a href="/delete/<?= urlencode($user['id']) ?>" class="delete"><i class="material-icons">&#xE872;</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>