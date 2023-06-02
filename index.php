<?php session_start();
include 'models/Administrateur.php';
include 'models/Agent.php';
include 'models/Cible.php';
include 'models/Contact.php';
include 'models/Mission.php';
include 'models/MonPdo.php';
include 'models/Nationalite.php';
include 'models/Planque.php';
include 'models/Specialite.php';
include 'views/header.php';

$userCase = empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch ($userCase) {

    case 'accueil':
        include 'views/accueil.php';
        break;

    case 'administration':
        include 'views/administration/administration.php';
        break;

    case 'mission':
        include 'controllers/missionController.php';
        break;

    case 'agent':
        include 'controllers/agentController.php';
        break;

    case 'nationalite':
        include 'controllers/nationaliteController.php';
        break;

    case 'specialite':
        include 'controllers/specialiteController.php';
        break;

    default:
        include 'views/404/404.php';
        break;
}

include 'views/footer.php';
