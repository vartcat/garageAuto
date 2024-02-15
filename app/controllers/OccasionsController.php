<?php

use MyApp\Controller;

require_once 'FooterController.php';

class OccasionsController extends Controller
{
    public function index()
    {
        $sql = 'SELECT occasions.*, photos.photo FROM occasions LEFT JOIN photos ON occasions.id = photos.id_occasion';
        $this->db->query($sql);
        $occasions = $this->db->resultSet();

        $data['occasions'] = array();

        foreach ($occasions as $occasion) {
            $occasion_id = $occasion['id'];
            
            if (!isset($data['occasions'][$occasion_id])) {
                $data['occasions'][$occasion_id] = array(
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
                $data['occasions'][$occasion_id]['photos'][] = 'data:image/jpeg;base64,' . base64_encode($occasion['photo']);
            }
        }

        $data['occasions'] = array_values($data['occasions']);
        $data['openTimes'] = FooterController::getOpeningHours();
        $data['title'] = "Occasions";

        $this->template('header', $data);
        $this->view('occasions/occasions', $data);
        $this->template('footer', $data);
    }

    public function get_photos_by_occasion_id($occasion_id)
    {
        $sql = 'SELECT * FROM photos WHERE id_occasion = :occasion_id';
        $this->db->query($sql);
        $this->db->bind(':occasion_id', $occasion_id);
        return $this->db->resultSet();
    }

    public function read()
    {
        $sql = 'SELECT * FROM occasions';
        $this->db->query($sql);
        $occasions = $this->db->resultSet();

        // Récupérer les photos pour chaque occasion
        foreach ($occasions as $occasion) {
            $occasion['photos'] = $this->get_photos_by_occasion_id($occasion['id']);
        }

        $data['occasions'] = $occasions;
        $data['title'] = "OccasionsCrud";
        $this->template('header', $data);
        $this->view('occasions/read', $data);
    }


    public function create()
    {
        $data['title'] = "OccasionsCrud";
        $this->template('header', $data);
        $this->view('occasions/create', $data);
    }

    public function addOccasions()
    {
        // Récupération des données de l'occasion depuis le formulaire
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];
        $boite = $_POST['boite'];
        $description = $_POST['description'];
        $carburant = $_POST['carburant'];
        $kilometre = $_POST['kilometre'];
        $prix = $_POST['prix'];

        // Insertion des données de l'occasion dans la table "occasions"
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

        // Récupération de l'ID de l'occasion nouvellement insérée
        $occasionId = $this->db->lastInsertId();

        // Gestion de l'upload des photos
        foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
            // Récupération des données de l'image
            $image_name = $_FILES['photos']['name'][$key];
            $image_tmp = $_FILES['photos']['tmp_name'][$key];

            // Lecture de l'image
            $image_blob = file_get_contents($image_tmp);

            // Insertion de l'image dans la table "photos"
            $this->db->query('INSERT INTO photos (nom_photo, id_occasion, photo) VALUES (:nom_photo, :id_occasion, :photo)');
            $this->db->bind(":nom_photo", $image_name);
            $this->db->bind(":id_occasion", $occasionId);
            $this->db->bind(":photo", $image_blob);
            $this->db->execute();
        }

        // Redirection vers la page de lecture des occasions
        $this->redirect('/occasions/read');
    }


    public function delete()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);

        $this->db->query("SELECT * FROM occasions WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['occasions'] = $this->db->single();

        $data['title'] = "Occasions";
        $this->template('header', $data);
        $this->view('/occasions/delete', $data);
    }

    public function removeOccasions()
    {
        $id = $_POST['id'];

        // Supprimer les photos associées à l'occasion
        $this->db->query("DELETE FROM photos WHERE id_occasion = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();

        // Supprimer l'occasion
        $this->db->query("DELETE FROM occasions WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();

        $this->redirect('/occasions/read');
    }


    public function update()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode('/', rtrim($uri, '/'));
        $data['id'] = end($segment);

        $this->db->query("SELECT * FROM occasions WHERE id = :id");
        $this->db->bind(":id", $data['id']);
        $data['occasions'] = $this->db->single();

        // Sélectionner également les photos associées à l'occasion
        $this->db->query("SELECT * FROM photos WHERE id_occasion = :id");
        $this->db->bind(":id", $data['id']);
        $data['photos'] = $this->db->resultSet();

        $data['title'] = "Occasions";
        $this->template('header', $data);
        $this->view('/occasions/update', $data);
    }

    public function updateOccasions()
    {
        $id = $_POST['id'];
        $modele = $_POST['modele'];
        $annee = $_POST['annee'];
        $description = $_POST['description'];
        $carburant = $_POST['carburant'];
        $kilometre = $_POST['kilometre'];
        $prix = $_POST['prix'];

        // Mettre à jour les données de l'occasion
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
        if (isset($_FILES['photos'])) {
            foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
                $image_name = $_FILES['photos']['name'][$key];
                $image_tmp = $_FILES['photos']['tmp_name'][$key];
                $image_blob = file_get_contents($image_tmp);

                // Insérer la nouvelle photo dans la table "photos"
                $this->db->query('INSERT INTO photos (nom_photo, id_occasion, photo) VALUES (:nom_photo, :id_occasion, :photo)');
                $this->db->bind(":nom_photo", $image_name);
                $this->db->bind(":id_occasion", $id);
                $this->db->bind(":photo", $image_blob);
                $this->db->execute();
            }
        }

        if (isset($_POST['delete_photos'])) {
            $photosToDelete = $_POST['delete_photos'];

            // Supprimer les photos sélectionnées
            foreach ($photosToDelete as $photoId) {
                $this->db->query("DELETE FROM photos WHERE id = :photoId");
                $this->db->bind(":photoId", $photoId);
                $this->db->execute();
            }
        }

        $this->redirect('/occasions/read');
    }
}
