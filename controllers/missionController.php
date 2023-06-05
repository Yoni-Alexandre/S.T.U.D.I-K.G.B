<?php

namespace controllers;

use models\Agent;
use models\Cible;
use models\Contact;
use models\Mission;
use models\Planque;
use models\Specialite;
use PDO;

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {

//PAGINATION DEBUT
    case 'listeMissions':
        $pageCourante = 1;
        $nbMissionsParPage = 3;
        $missions = Mission::findPage($pageCourante, $nbMissionsParPage);
        $nbPages = Mission::getNbPages($nbMissionsParPage);
        include('views/missions/missions.php');
        break;

    case 'liste':
        $pageCourante = $_GET['page'];
        $nbMissionsParPage = 3;
        $missions = Mission::findPage($pageCourante, $nbMissionsParPage);
        $nbPages = Mission::getNbPages($nbMissionsParPage);
        include('views/missions/missions.php');
        break;

    case 'page':
        $pageCourante = $_GET['page'];
        $missions = Mission::findPage($pageCourante, 5);
        include('views/missions/missions.php');
        break;

    case 'precedent':
        $pageCourante = $_GET['page'];
        $missions = Mission::findPage($pageCourante, -1);
        include('views/missions/missions.php');
        break;

    case 'suivant':
        $pageCourante = $_GET['page'];
        $missions = Mission::findPage($pageCourante, 1);
        include('views/missions/missions.php');
        break;
//PAGINATION FIN

    case 'add':
        $specialites = Specialite::findAll();
        $agents = Agent::findAll();
        $contacts = Contact::findAll();
        $cibles = Cible::findAll();
        $planques = Planque::findAll();
        include('form/missions/formMission.php');
        break;

    case 'valideForm':
        $mission = new Mission();
        $missionForm = Mission::add($mission);
        include 'views/missions/valideAjoutMission.php';
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

        include 'form/missions/formModifMission.php';
        break;

    case 'valideModif':
        $mission = new Mission();
        $missionForm = Mission::update($mission);
        include 'views/missions/valideModifMission.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        $mission = Mission::delete($id);
        include 'views/missions/missionSuppr.php';
        break;

    case 'search':
        if(isset($_POST['search'])) {
            $keyword = $_POST['search'];
            $missions = Mission::search($keyword);
        } else {
            $missions = Mission::findAll();
        }
        include 'views/missions/missionRecherche.php';
        break;

        case 'detail':
            $id = $_GET['id'];
            $req = \MonPdo::getInstance()->prepare("SELECT * FROM missions WHERE id = :id");
            $req->setFetchMode(PDO::FETCH_OBJ);
            $req->bindParam(':id', $id);
            $req->execute();
            $mission = $req->fetch();
            include 'views/missions/detailMission.php';
            break;


    default:
        include 'views/404/404.php';
        break;
}
