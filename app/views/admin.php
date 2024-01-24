<div class="content">
    <h2>Bienvenue Administrateur : <br>
        <?php
        $user = $_SESSION['admin'];
        $this->db->query("SELECT * FROM `user` WHERE `id`='$user'");
        $this->db->execute();
        $user = $this->db->single();
        echo $user['name'] . " " . $user['lastname']
        ?>
    </h2>
    <p>Choisissez un élément à créer, modifier ou supprimer</p>
</div>

<div class="container">
    <div class="employed">
        <a type="button" href="employedCrud/read" class="btnContainer">Gérer les comptes des employés</a>
    </div>
    <div class="services">
        <a type="button" href="servicesCrud/read" class="btnContainer">Gérer les prestations du garage</a>
    </div>
    <div class="openTime">
        <a type="button" href="openTimeCrud/read" class="btnContainer">Gérer les horaires d'ouverture du garage</a>
    </div>
</div>