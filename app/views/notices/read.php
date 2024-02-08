<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nom</th>
            <th scope="col">prénom</th>
            <th scope="col">email</th>
            <th scope="col">avis</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($notices as $notice) : ?>
            <tr>
                <td><?= $notice['id'] ?></td>
                <td><?= $notice['name'] ?></td>
                <td><?= $notice['lastname'] ?></td>
                <td><?= $notice['email'] ?></td>
                <td><?= $notice['avis'] ?></td>
                <td>
                    <a href="validated<?= urlencode($notice['id']) ?>" class="edit"><i class="material-icons">&#xE254;</i></a>
                    <a href="/delete/<?= urlencode($notice['id']) ?>" class="delete"><i class="material-icons">&#xE872;</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>