<?php session_start();
include 'views/header.php';
include 'models/Mission.php';
include 'models/Agent.php';
include 'models/Contact.php';
include 'models/Cible.php';
include 'models/Planque.php';
include 'models/MonPdo.php';
include 'models/Specialite.php';

$userCase = empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch ($userCase) {
    case 'accueil':
        include 'views/accueil.php';
        break;

    case 'administration':
        include 'views/administration.php';
        break;

    case 'mission':
        include 'controllers/missionController.php';
        break;

    default:
        include 'views/404.php';
        break;
}

include 'views/footer.php';
