<?php

namespace controllers;


use models\Agent;
use models\Cible;
use models\Contact;
use models\Mission;
use models\Planque;

$action = $_GET['action'];
switch ($action) {
    case 'listeMissions':
        $missions = Mission::findAll();
        include('views/missions.php');
        break;

    case 'add':
        $agents = Agent::findAll();
        $contacts = Contact::findAll();
        $cibles = Cible::findAll();
        $planques = Planque::findAll();
        include('views/formMission.php');
        break;

    case 'valideForm':
        include 'views/valideAjoutMission.php';
        break;

    default:
        echo "Action inconnue";
        break;
}
