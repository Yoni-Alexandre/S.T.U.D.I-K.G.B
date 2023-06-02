<?php

namespace controllers;

use mysqli;

$action = $_GET['action'];

switch ($action) {

    case 'login':
        include('form/administrations/formLogin.php');
        break;

    case 'logout':
        include('views/administration/valideLogout.php');
        break;

    case 'test':
        include('views/administration/logout.php');
        break;

        case 'connexion':
            if (isset($_POST['username']) && isset($_POST['password'])) {
                // Récupération des données du formulaire
                $username = $_POST['username'];
                $password = $_POST['password'];

                // connexion à la base de données
                $servername = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbName = "studi_kgb";

                $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

                // Vérification des erreurs de connexion
                if ($conn->connect_error) {
                    die("Erreur de connexion à la base de données : " . $conn->connect_error);
                }

                // Vérification des informations de l'utilisateur en exécutant la requête de sélection pour l'utilisateur
                $sql = "SELECT * FROM administrateurs WHERE adresse_mail = '$username' AND mot_de_passe = '$password'";
                $result = $conn->query($sql);

                // Vérifier si l'utilisateur existe dans la base de données
                if ($result->num_rows == 1) {
//                    echo "Connexion réussie";
                    include ('views/administration/administration.php');
                } else {
//                    echo "Nom d'utilisateur ou mot de passe incorrect.";
                    include('views/administration/erreurConnexion.php');
                }

                // Fermeture de la base de données
                $conn->close();
            }

            break;
}