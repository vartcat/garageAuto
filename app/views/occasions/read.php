<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">modèle</th>
            <th scope="col">année</th>
            <th scope="col">description</th>
            <th scope="col">carburant</th>
            <th scope="col">kilométrage</th>
            <th scope="col">prix</th>
            <th scope="col">nombre de photos</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($occasions as $occasion) : ?>
            <tr>
                <td><?= $occasion['id'] ?></td>
                <td><?= $occasion['modele'] ?></td>
                <td><?= $occasion['annee'] ?></td>
                <td><?= $occasion['description'] ?></td>
                <td><?= $occasion['carburant'] ?></td>
                <td><?= $occasion['kilometre'] ?></div>
                </td>
                <td><?= $occasion['prix'] ?></td>
                <td>
                    <?php
                        // Récupération du nombre de photos pour l'ID de l'occasion actuelle
                        $id_occasion = $occasion['id'];
                        $this->db->query("SELECT COUNT(*) AS total_photos FROM photos WHERE id_occasion = :id_occasion");
                        $this->db->bind(":id_occasion", $id_occasion);
                        $this->db->execute();
                        $result = $this->db->single();
                        $total_photos = $result['total_photos'];
                        echo $total_photos;
                    ?>
                </td>
                <td>
                    <a href="update/<?= urlencode($occasion['id']) ?>" class="edit"><i class="material-icons">&#xE254;</i></a>
                    <a href="delete/<?= urlencode($occasion['id']) ?>" class="delete"><i class="material-icons">&#xE872;</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
