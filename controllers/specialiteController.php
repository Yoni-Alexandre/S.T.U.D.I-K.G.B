<?php

namespace controllers;

use models\Specialite;
use PDO;

$action = $_GET['action'];
switch ($action) {

    case 'listeSpecialites':
        $specialites = Specialite::findAll();
        include('views/specialites/specialites.php');
        break;

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
}

