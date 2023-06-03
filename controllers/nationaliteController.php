<?php

namespace controllers;

use models\Nationalite;
use PDO;

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {

    case 'listeNationalites':
        $pageCourante = 1;
        $nbNationaliteParPage = 5;
        $nationalites = Nationalite::findPage($pageCourante, $nbNationaliteParPage);
        $nbPages = Nationalite::getNbPages($nbNationaliteParPage);
        include('views/nationalites/nationalites.php');
        break;

//PAGINATION DEBUT
    case 'liste':
        $pageCourante = $_GET['page'];
        $nbNationaliteParPage = 5;
        $nationalites = Nationalite::findPage($pageCourante, $nbNationaliteParPage);
        $nbPages = Nationalite::getNbPages($nbNationaliteParPage);
        include('views/nationalites/nationalites.php');
        break;

    case 'page':
        $pageCourante = $_GET['page'];
        $nationalites = Nationalite::findPage($pageCourante, 5);
        include('views/nationalites/nationalites.php');
        break;

    case 'precedent':
        $pageCourante = $_GET['page'];
        $nationalites = Nationalite::findPage($pageCourante, -1);
        include('views/nationalites/nationalites.php');
        break;

    case 'suivant':
        $pageCourante = $_GET['page'];
        $nationalites = Nationalite::findPage($pageCourante, 1);
        include('views/nationalites/nationalites.php');
        break;
//PAGINATION FIN

    case 'add':
        $nationalites = Nationalite::findAll();
        include('form/nationalites/formNationalite.php');
        break;

    case 'valideForm':
        $nationaliteForm = Nationalite::add();
        include 'views/nationalites/valideAjoutNationalite.php';
        break;

    case 'update':
        $id = $_GET['id'];
        $req = \MonPdo::getInstance()->prepare('SELECT * FROM nationalites WHERE id = :id');
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->bindParam(':id', $id);
        $req->execute();
        $nationalite = $req->fetch();
        include 'form/nationalites/formModifNationalite.php';
        break;

    case 'valideModif':
        $nationalite = new Nationalite();
        $nationaliteForm = Nationalite::update($nationalite);
        include 'views/nationalites/valideModifNationalite.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        $mission = Nationalite::delete($id);
        include 'views/nationalites/nationaliteSuppr.php';
        break;

    default:
        include 'views/404/404.php';
        break;
}

