<?php

namespace controllers;

use models\Nationalite;
use PDO;

$action = $_GET['action'];
switch ($action) {

    case 'listeNationalites':
        $nationalites = Nationalite::findAll();
        include('views/nationalites/nationalites.php');
        break;

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
}

