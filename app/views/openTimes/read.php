<table>
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">jour</th>
            <th scope="col">ouverture</th>
            <th scope="col">fermeture</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($openTimes as $openTime) : ?>
            <tr>
                <td><?= $openTime['id'] ?></td>
                <td><?= $openTime['jour'] ?></td>
                <td><?= $openTime['ouverture'] ?></td>
                <td><?= $openTime['fermeture'] ?></td>
                <td>
                    <a href="update/<?= urlencode($openTime['id']) ?>" class="edit"><i class="material-icons">&#xE254;</i></a>
                </td>
            </tr>
        <?php endforeach;
        ?>
    </tbody>
    <tfooter> Fermé le dimanche et jours fériés</tfooter>
</table>