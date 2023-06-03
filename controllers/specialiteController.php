<?php

namespace controllers;

use models\Specialite;
use PDO;

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
//PAGINATION DEBUT
    case 'listeSpecialites':
        $pageCourante = 1;
        $nbspecialiteParPage = 8;
        $specialites = Specialite::findPage($pageCourante, $nbspecialiteParPage);
        $nbPages = Specialite::getNbPages($nbspecialiteParPage);
        include('views/specialites/specialites.php');
        break;

    case 'liste':
        $pageCourante = $_GET['page'];
        $nbspecialiteParPage = 8;
        $specialites = Specialite::findPage($pageCourante, $nbspecialiteParPage);
        $nbPages = Specialite::getNbPages($nbspecialiteParPage);
        include('views/specialites/specialites.php');
        break;

    case 'page':
        $pageCourante = $_GET['page'];
        $specialites = Specialite::findPage($pageCourante, 5);
        include('views/specialites/specialites.php');
        break;

    case 'precedent':
        $pageCourante = $_GET['page'];
        $specialites = Specialite::findPage($pageCourante, -1);
        include('views/specialites/specialites.php');
        break;

    case 'suivant':
        $pageCourante = $_GET['page'];
        $specialites = Specialite::findPage($pageCourante, 1);
        include('views/specialites/specialites.php');
        break;
    //PAGINATION FIN

    case 'add':
        $Specialites = Specialite::findAll();
        include('form/specialites/formSpecialite.php');
        break;

    case 'valideForm':
        $SpecialiteForm = Specialite::add();
        include 'views/specialites/valideAjoutSpecialite.php';
        break;

    case 'update':
        $id = $_GET['id'];
        $req = \MonPdo::getInstance()->prepare('SELECT * FROM specialites WHERE id = :id');
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->bindParam(':id', $id);
        $req->execute();
        $specialite = $req->fetch();
        include 'form/specialites/formModifSpecialite.php';
        break;

    case 'valideModif':
        $Specialite = new Specialite();
        $SpecialiteForm = Specialite::update($Specialite);
        include 'views/Specialites/valideModifSpecialite.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        $mission = Specialite::delete($id);
        include 'views/Specialites/specialiteSuppr.php';
        break;

    default:
        include 'views/404/404.php';
        break;
}

