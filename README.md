# GARAGE V PARROT

## Description

Service de gestion des prestations et services d'un garage automobile

### Installation du Projet en Local

Ce guide vous aidera à installer le projet localement en utilisant PHP avec PDO (PHP Data Objects) pour la connexion à une base de données MySQL, ainsi que Bootstrap pour le design et CSS/jQuery pour l'interactivité.

1. **Prérequis :**

   Assurez-vous d'avoir les éléments suivants installés sur votre machine :
   - Serveur Web (Apache, Nginx, etc.)
   - PHP (version 8.0 ou supérieure)
   - MySQL
   - Un éditeur de texte ou un environnement de développement intégré (IDE) comme Visual Studio Code, Sublime Text, etc.

2. **Téléchargement du Projet :**

   ```sh
    git clone https://github.com/vartcat/garageAuto   
    cd garageAuto
    composer install
   ```

3. **Extraction du Projet :**

   Décompressez le fichier si nécessaire et placez le projet dans le répertoire de votre serveur web local. Par exemple, pour Apache, placez-le dans le répertoire htdocs.

4. **Configuration de la Base de Données :**

   - Ouvrez votre gestionnaire de base de données (par exemple, phpMyAdmin).
   - Créez une nouvelle base de données et notez son nom : "garage_automobile"
   - Importez le fichier SQL fourni avec le projet dans la base de données nouvellement créée, ou utilisez la ligne de commande :
   
     ```sh
        mysql -u root -p garage_automobile < garage_automobile.sql
     ```

5. **Configuration de PDO :**

   - Dans le répertoire du projet, ouvrez le fichier de configuration de la base de données (config/Config.php) dans un éditeur de texte.
   - Modifiez les paramètres de connexion PDO pour correspondre à votre configuration de base de données (hôte, nom de la base de données, nom d'utilisateur, mot de passe).

     ```php
        define("DB_HOST", "localhost");
        define("DB_USER", "root");
        define("DB_PASS", "root");
        define("DB_NAME", "garage_automobile");
     ```

6. **Configuration du Simple Storage Service (S3) :**

   - Dans le fichier de configuration (config/Config.php), ajoutez les crédentials pour le service
   [S3](https://aws.amazon.com/fr/s3/) d'Amazon, utilisé ici pour les images de la base de données.

     ```php
        define("S3_BUCKET", "bucket");
        define("S3_REGION", "us-north-1");
        define("S3_APIKEY", "api-key");
        define("S3_SECRET", "secret");
        define("S3_BASEURL", "https://url.s3.us-north-1.amazonaws.com/");
     ```

7. **Accès au Projet :**

   - Lancez votre serveur web local.
   - Dans votre navigateur web, accédez au projet en utilisant l'URL correspondant à l'emplacement où vous avez placé les fichiers du projet.

8. **Connexion au Dashboard Administrateur :**

   - Accédez à l'URL http://localhost:8888/login
   - Identifiants par défaut :
   - Identifiant : rootadmin@mail.com
   - Mot de passe : root

#### Modèle MVC PDO PHP Simple

**Aperçu :**

Ce modèle PHP est une implémentation simple du modèle architectural Modèle-Vue-Contrôleur (MVC) utilisant PDO (PHP Data Objects) pour la connectivité à la base de données.

**Composants :**

1. **Modèles :**
   - Le répertoire `models` est destiné à l'organisation de vos modèles de données.

2. **Vues :**
   - Le répertoire `views` contient les modèles HTML.

3. **Contrôleurs :**
   - Le répertoire `controllers` est l'endroit où sont organisées les classes de contrôleur.

4. **Configuration :**
   - Le fichier `Config` contient des constantes pour configurer la connexion à la base de données et l'URL de base. Mettez à jour les valeurs en fonction de votre environnement.

5. **Contrôleur :**
   - La classe `Controller` agit comme le contrôleur de base pour l'application.

6. **Routeur :**
   - La classe `Router` gère le routage des requêtes entrantes vers le contrôleur et l'action appropriés.

7. **Base de données :**
   - La classe `Database` encapsule la logique de connexion à la base de données en utilisant PDO.
