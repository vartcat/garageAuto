<footer class="container-fluid footer_section">
    <div class="footer_logo">
    <a class="navbar-brand" href="/home">
        <p>Garage V.Parrot</p>
        <img src="/public/pictures/logo.png" alt="Logo" class="logo">
    </a>
    </div>
    <div class="opening-time">
        <table>
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">ouvert</th>
                    <th scope="col">fermé</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($openTimes as $openTime) : ?>
                    <tr>
                        <td><?= ucfirst($openTime['jour']) ?></td>
                        <td><?= substr($openTime['ouverture'], 0, 5) ?></td>
                        <td><?= substr($openTime['fermeture'], 0, 5) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>Fermé le dimanche et jours fériés</p>

    </div>
    <div class="back-to-top">
        <a href="#top">Haut de page</a>
    </div>
</footer>