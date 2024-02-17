<?php

use MyApp\Controller;

require_once 'FooterController.php';

class OccasionsController extends Controller
{
    public function index()
    {
        try {
            $sql = 'SELECT occasions.*, photos.photo FROM occasions LEFT JOIN photos ON occasions.id = photos.id_occasion';
            $this->db->query($sql);
            $occasions = $this->db->resultSet();

            if (!$occasions) {
                throw new Exception("Aucune occasion trouvée.");
            }

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
        } catch (Exception $e) {
            // Gérer l'exception
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }

    public function get_photos_by_occasion_id($occasion_id)
    {
        try {
            $sql = 'SELECT * FROM photos WHERE id_occasion = :occasion_id';
            $this->db->query($sql);
            $this->db->bind(':occasion_id', $occasion_id);
            return $this->db->resultSet();
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function read()
    {
        try {
            $sql = 'SELECT * FROM occasions';
            $this->db->query($sql);
            $occasions = $this->db->resultSet();

            // Récupérer les photos pour chaque occasion
            foreach ($occasions as &$occasion) {
                $occasion['photos'] = $this->get_photos_by_occasion_id($occasion['id']);
            }

            $data['occasions'] = $occasions;
            $data['title'] = "OccasionsCrud";
            $this->template('header', $data);
            $this->view('occasions/read', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function create()
    {
        $data['title'] = "OccasionsCrud";
        $this->template('header', $data);
        $this->view('occasions/create', $data);
    }

    public function addOccasions()
    {
        try {
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

                    // Insertion de l'image dans la table "photos"
                    $this->db->query('INSERT INTO photos (nom_photo, id_occasion, photo) VALUES (:nom_photo, :id_occasion, :photo)');
                    $this->db->bind(":nom_photo", $image_name);
                    $this->db->bind(":id_occasion", $occasionId);
                    $this->db->bind(":photo", $image_blob);
                    $this->db->execute();
                }
            }

            $this->redirect('/occasions/read');
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function delete()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'];
            $segment = explode('/', rtrim($uri, '/'));
            $data['id'] = end($segment);

            $this->db->query("SELECT * FROM occasions WHERE id = :id");
            $this->db->bind(":id", $data['id']);
            $data['occasions'] = $this->db->single();

            $data['title'] = "Occasions";
            $this->template('header', $data);
            $this->view('/occasions/delete', $data);
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function removeOccasions()
    {
        try {
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
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }


    public function update()
    {
        try {
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
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    public function updateOccasions()
    {
        try {
            $id = $_POST['id'];
            $modele = $_POST['modele'];
            $annee = $_POST['annee'];
            $description = $_POST['description'];
            $carburant = $_POST['carburant'];
            $kilometre = $_POST['kilometre'];
            $prix = $_POST['prix'];

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
                            // Insérer la nouvelle photo dans la table "photos"
                            $this->db->query('INSERT INTO photos (nom_photo, id_occasion, photo) VALUES (:nom_photo, :id_occasion, :photo)');
                            $this->db->bind(":nom_photo", $image_name);
                            $this->db->bind(":id_occasion", $id);
                            $this->db->bind(":photo", $image_blob);
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
                    $this->db->query("DELETE FROM photos WHERE id = :photoId");
                    $this->db->bind(":photoId", $photoId);
                    $this->db->execute();
                }
            }

            $this->redirect('/occasions/read');
        } catch (Throwable $e) {
            $this->handleError($e);
        }
    }

    private function handleError(Throwable $e)
    {
        $data['error_message'] = "Une erreur s'est produite. Veuillez réessayer plus tard.";
        $this->view('/errors/error', $data);
        error_log("Erreur : " . $e->getMessage());
    }
}
