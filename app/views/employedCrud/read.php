<?php

$sql = 'SELECT * FROM user';
try {
    $this->db->query($sql);
    $users = $this->db->resultSet(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<div class="content_read">
    <h2>liste des employés du garage</h2>
    <a href="create" class="create_employed">Créer un compte employé</a>
    <table>
        <th>
            <tr>
                <td>#</td>
                <td>nom</td>
                <td>prénom</td>
                <td>email</td>
                <td>mot de passe</td>
                <td>date de création du compte</td>
                <td>rôle</td>
            </tr>
        </th>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['lastname'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td><?= $user['registerDate'] ?></td>
                    <td><?= $user['role'] ?></td>

                    <td class="actions">
                        <a href="update?id=<?= $user['id'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="delete?id=<?= $user['id'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>