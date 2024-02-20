<?php

class Occasions
{
    private $db;
    private $storage;

    public function __construct($database, $storage)
    {
        $this->db = $database;
        $this->storage = $storage;
    }

    public function getAll() {
        $sql = 'SELECT occasions.*, photos.photo FROM occasions LEFT JOIN photos ON occasions.id = photos.id_occasion';
        $this->db->query($sql);
        $results = $this->db->resultSet();

        if (!$results) {
            $results = array();
        }

        $output = array();

        foreach ($results as $occasion) {
            $occasion_id = $occasion['id'];

            if (!isset($output[$occasion_id])) {
                $output[$occasion_id] = array(
                    'id' => $occasion_id,
                    'prix' => $occasion['prix'],
                    'modele' => $occasion['modele'],
                    'annee' => $occasion['annee'],
                    'boite' => $occasion['boite'],
                    'description' => $occasion['description'],
                    'kilometre' => $occasion['kilometre'],
                    'carburant' => $occasion['carburant'],
                    'photos' => array()
                );
            }

            if (!empty($occasion['photo'])) {
                $output[$occasion_id]['photos'][] = $occasion['photo'];
            }
        }

        return array_values($output);
    }

    public function getPhotosByOccasionId($occasion_id)
    {
            $sql = 'SELECT * FROM photos WHERE id_occasion = :occasion_id';
            $this->db->query($sql);
            $this->db->bind(':occasion_id', $occasion_id);
            return $this->db->resultSet();
    }

    public function create($modele, $annee, $boite, $description, $carburant, $kilometre, $prix) {
        $this->db->query('INSERT INTO occasions (modele, annee, boite, description, carburant, kilometre, prix) 
            VALUES (:modele, :annee, :boite, :description, :carburant, :kilometre, :prix)');

            $this->db->bind(":modele", $modele);
            $this->db->bind(":annee", $annee);
            $this->db->bind(":boite", $boite);
            $this->db->bind(":description", $description);
            $this->db->bind(":carburant", $carburant);
            $this->db->bind(":kilometre", $kilometre);
            $this->db->bind(":prix", $prix);

            $this->db->execute();

            $occasionId = $this->db->lastInsertId();

            // Vérifier si des photos ont été téléchargées
            if (!empty($_FILES['photos']['tmp_name'][0])) {
                // Gestion de l'upload des photos
                foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
                    // Récupération des données de l'image
                    $image_name = $_FILES['photos']['name'][$key];
                    $image_tmp = $_FILES['photos']['tmp_name'][$key];

                    // Lecture de l'image
                    $image_blob = file_get_contents($image_tmp);
                    $image_path = $this->storage->uploadImage('occasions/'.$occasionId.'/'.$image_name, $image_blob);

                    // Insertion de l'image dans la table "photos"
                    $this->db->query('INSERT INTO photos (name_photo, id_occasion, photo) VALUES (:name_photo, :id_occasion, :photo)');
                    $this->db->bind(":name_photo", $image_name);
                    $this->db->bind(":id_occasion", $occasionId);
                    $this->db->bind(":photo", $image_path);
                    $this->db->execute();
                }
            }
    }
    
    public function getById($id) {
        $this->db->query("SELECT * FROM occasions WHERE id = :id");
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function deleteById($id) {
        $this->db->query("SELECT * FROM photos WHERE id_occasion = :id");
        $this->db->bind(":id",  $id);
        $photos = $this->db->resultSet();

        foreach ($photos as &$photo) {
            $this->storage->deleteImage($photo['photo']);
        }        
                
        // Supprimer les photos associées à l'occasion
        $this->db->query("DELETE FROM photos WHERE id_occasion = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();

        // Supprimer l'occasion
        $this->db->query("DELETE FROM occasions WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    public function update($id, $modele , $annee, $description, $carburant, $kilometre, $prix) {
        $this->db->query("UPDATE occasions SET modele = :modele, annee = :annee, description = :description, carburant = :carburant, kilometre = :kilometre, prix = :prix WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->bind(":modele", $modele);
        $this->db->bind(":annee", $annee);
        $this->db->bind(":description", $description);
        $this->db->bind(":carburant", $carburant);
        $this->db->bind(":kilometre", $kilometre);
        $this->db->bind(":prix", $prix);
        $this->db->execute();

        // Gérer l'ajout ou la suppression des photos
        if (isset($_FILES['photos']['tmp_name'][0])) {
            foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
                // Vérifier si un fichier a été téléchargé
                if (!empty($tmp_name)) {
                    $image_name = $_FILES['photos']['name'][$key];
                    $image_tmp = $_FILES['photos']['tmp_name'][$key];

                    // Vérifier si le fichier est valide avant de le lire
                    if (is_uploaded_file($image_tmp)) {
                        $image_blob = file_get_contents($image_tmp);
                        $image_path = $this->storage->uploadImage('occasions/'.$id.'/'.$image_name, $image_blob);
                        // Insérer la nouvelle photo dans la table "photos"
                        $this->db->query('INSERT INTO photos (name_photo, id_occasion, photo) VALUES (:name_photo, :id_occasion, :photo)');
                        $this->db->bind(":name_photo", $image_name);
                        $this->db->bind(":id_occasion", $id);
                        $this->db->bind(":photo", $image_path);
                        $this->db->execute();
                    } else {
                        echo "Erreur lors du téléchargement du fichier.";
                    }
                }
            }
        }

        if (isset($_POST['delete_photos'])) {
            $photosToDelete = $_POST['delete_photos'];

            // Supprimer les photos sélectionnées
            foreach ($photosToDelete as $photoId) {
                $this->db->query("SELECT * FROM photos WHERE id = :id");
                $this->db->bind(":id", $photoId);
                $image = $this->db->single();                    
                $this->storage->deleteImage($image['photo']);

                $this->db->query("DELETE FROM photos WHERE id = :photoId");
                $this->db->bind(":photoId", $photoId);
                $this->db->execute();
            }
        }
    }
}
