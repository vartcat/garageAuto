<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nom</th>
            <th scope="col">description</th>
            <th scope="col">prix</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($prestations as $prestation) : ?>
            <tr>
                <td><?= $prestation['id'] ?></td>
                <td><?= $prestation['name'] ?></td>
                <td><?= $prestation['description'] ?></td>
                <td><?= $prestation['price'] ?></td>
                <td>
                    <a href="update/<?= urlencode($prestation['id']) ?>" class="edit"><i class="material-icons">&#xE254;</i></a>
                    <a href="delete/<?= urlencode($prestation['id']) ?>" class="delete"><i class="material-icons">&#xE872;</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>