<footer class="container-fluid footer_section">
    <div class="footer_logo">
        <p>Garage V.Parrot</p>
        <img src="/public/pictures/logo.png" alt="Logo" class="logo">
    </div>
    <div class="opening-time">
        <table>
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">ouverture</th>
                    <th scope="col">fermeture</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($openTimes as $openTime) : ?>
                    <tr>
                        <td><?= $openTime['jour'] ?></td>
                        <td><?= $openTime['ouverture'] ?></td>
                        <td><?= $openTime['fermeture'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="back-to-top">
        <a href="#top">Retour en haut de page</a>
    </div>
</footer>