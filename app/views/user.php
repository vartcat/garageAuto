<?php
    $user = $_SESSION['user'];
    $this->db->query("SELECT * FROM `user` WHERE `id`='$user'");
    $this->db->execute();
    $user = $this->db->single();
?>
<section class="slider_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-box">
                    <div class="logo">
                        <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                    </div>
                    <h1>
                        Bienvenue <br>
                        <span>
                            Employé <?= $user['name'] ?>
                        </span>
                    </h1>
                    <h2>Voici votre
                        <span>
                            Dashboard
                        </span>
                    </h2>
                    <h3>
                        Choisissez un élément à modifier:
                    </h3>
                    <div class="btn-box">
                        <div class="btn-crud">
                            <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                            <a href="occasions/read" class="btn-2 col-md-6">Ajoutez Véhicules d'Occasions</a>
                        </div>
                        <div class="btn-crud">
                            <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                            <a href="notices/read" class="btn-2 col-md-6">Ajoutez Avis Clientèle</a>
                        </div>
                        <div class="btn-crud">
                            <h2 class="logo-badge text-whitesmoke"><span class="fa fa-arrow-right"></span></h2>
                            <a href="messages/read" class="btn-2 col-md-6">Voir les messages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>