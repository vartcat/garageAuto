<div class="content">
    <h2>Bienvenue Employé : <br>
        <?php
        $user = $_SESSION['user'];
        $this->db->query("SELECT * FROM `user` WHERE `id`='$user'");
        $this->db->execute();
        $user = $this->db->single();
        echo $user['name'] . " " . $user['lastname']
        ?>
    </h2>
</div>

<div class="container">
    <div class="occasions">
        <a type="button" href="occasionsCarsCrud.php" class="btnContainer">Gérer les annonces de voitures d'occasions</a>
    </div>
</div>