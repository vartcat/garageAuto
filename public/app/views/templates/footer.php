<footer class="container-fluid footer_section">
    <div class="footer_logo">
        <a class="navbar-brand" href="/home">
            <img src="/pictures/logo.png" alt="Logo" class="logo">
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
    <div class="reseauLogo">
        <a class="" href="https://www.facebook.com">
            <img src="pictures/fbk.svg" alt="facebook link">
        </a>
        <a class="" href="https://www.twitter.com">
            <img src="pictures/twitter.svg" alt="twitter link">
        </a>
        <a class="" href="https://www.instagram.com">
            <img src="pictures/insta.svg" alt="instagram link">
        </a>
    </div>
    <div class="back-to-top">
        <a href="#top">Haut de page</a>
    </div>
</footer>