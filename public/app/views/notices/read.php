<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nom</th>
            <th scope="col">prénom</th>
            <th scope="col">email</th>
            <th scope="col">avis</th>
            <th scope="col">status</th>
            <th scope="col">note</th>
            <th scope="col">actions</th>
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
                <td><?= $notice['status'] ?></td>
                <td><?= $notice['note'] ?></td>
                <td>
                    <?php if ($notice['status'] == 'standing') : ?>
                        <form method="POST" action="/notices/validate/action">
                            <a href="validate/<?= urlencode($notice['id']) ?>" class="edit"><i class="material-icons">check</i></a>
                        </form>
                    <?php endif; ?>

                    <a href="delete/<?= urlencode($notice['id']) ?>" class="delete"><i class="material-icons">&#xE872;</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>