<h1>Liste des employés à ce jour :</h1>

<div class="col-sm-12">
    <a href="create" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Ajouter nouvel employé</span></a>
</div>
<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nom</th>
            <th scope="col">prénom</th>
            <th scope="col">email</th>
            <th scope="col">mot de passe</th>
            <th scope="col">date de création du compte</th>
            <th scope="col">rôle</th>
            <th scope="col">actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['lastname'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><div class="password"><?= $user['password'] ?></div></td>
                <td><?= $user['registerDate'] ?></td>
                <td><?= $user['role'] ?></td>
                <td>
                    <a href="update/<?= urlencode($user['id']) ?>" class="edit"><i class="material-icons">&#xE254;</i></a>
                    <a href="/delete/<?= urlencode($user['id']) ?>" class="delete"><i class="material-icons">&#xE872;</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>