<?php

namespace controllers;


use models\Agent;
use models\Cible;
use models\Contact;
use models\Mission;
use models\Planque;
use models\Specialite;
use PDO;

$action = $_GET['action'];
switch ($action) {
    case 'listeMissions':
        $missions = Mission::findAll();
        include('views/missions.php');
        break;

    case 'add':
        $specialites = Specialite::findAll();
        $agents = Agent::findAll();
        $contacts = Contact::findAll();
        $cibles = Cible::findAll();
        $planques = Planque::findAll();
        include('views/formMission.php');
        break;

    case 'valideForm':
        $mission = new Mission();
        $missionForm = Mission::add($mission);
        include 'views/valideAjoutMission.php';
        break;

    case 'valideModif':
        $mission = new Mission();
        $missionForm = Mission::update($mission);
        include 'views/valideModifMission.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        $mission = Mission::delete($id);
        include 'views/missionSuppr.php';
        break;

    case 'update':
        $id = $_GET['id'];
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM missions WHERE id = :id");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->bindParam(':id', $id);
        $req->execute();
        $mission = $req->fetch();
        $specialites = Specialite::findAll();
        $agents = Agent::findAll();
        $contacts = Contact::findAll();
        $cibles = Cible::findAll();
        $planques = Planque::findAll();

        include 'views/formModifMission.php';
        break;

    default:
        echo "Action inconnue";
        break;
}
