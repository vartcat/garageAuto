<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">date reçu</th>
            <th scope="col">nom</th>
            <th scope="col">prénom</th>
            <th scope="col">email</th>
            <th scope="col">téléphone</th>
            <th scope="col">sujet</th>
            <th scope="col">message</th>
            <th scope="col">actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $message) : ?>
            <tr>
                <td><?= $message['id'] ?></td>
                <td><?= $message['registerDate'] ?></td>
                <td><?= $message['name'] ?></td>
                <td><?= $message['lastname'] ?></td>
                <td><?= $message['email'] ?></td>
                <td><?= $message['telephone'] ?></div></td>
                <td><?= $message['sujet'] ?></td>
                <td><?= $message['message'] ?></td>
                <td>
                    <a href="delete/<?= urlencode($message['id']) ?>" class="delete"><i class="material-icons">&#xE872;</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>