<footer class="container-fluid footer_section">
    <div class="opening-time">
        <h3>Horaires d'ouverture :</h3>
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
                <?php endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <div>
        <p>Fermé dimanche et jours fériés</p>
    </div>
    <p>
        &copy; <span id="currentYear"></span> All Rights Reserved.
    </p>
</footer>

<!-- script JS -->

<script src="<?= BASEURL ?>/js/script.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>
