<?php
include_once '../../config/database.php';
global$pdo;
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dateNaissance = $_POST['date_naissance'];
$codeIdentification = $_POST['code_identification'];
$nationaliteId = $_POST['nationalite_id'];
$specialiteId = $_POST['specialite_id'];

$req = $pdo->prepare('INSERT INTO agents (nom, prenom, date_naissance, code_identification, nationalite_id, specialite_id) VALUES (:nom, :prenom, :date_naissance, :code_identification, :nationalite_id, :specialite_id)');
$req->bindParam(':nom', $nom);
$req->bindParam(':prenom', $prenom);
$req->bindParam(':date_naissance', $dateNaissance);
$req->bindParam(':code_identification', $codeIdentification);
$req->bindParam(':nationalite_id', $nationaliteId);
$req->bindParam(':specialite_id', $specialiteId);
$req->execute();