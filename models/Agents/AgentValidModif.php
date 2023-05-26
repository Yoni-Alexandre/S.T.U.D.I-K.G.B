<?php
global $pdo;
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_naissance = $_POST['date_naissance'];
$code_identification = $_POST['code_identification'];
$nationalite_id = $_POST['nationalite_id'];
$specialite_id = $_POST['specialite_id'];

$req = $pdo->prepare('UPDATE agents SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, code_identification = :code_identification, nationalite_id = :nationalite_id, specialite_id = :specialite_id WHERE id = :id');
$req->bindParam(':id', $id);
$req->bindParam(':nom', $nom);
$req->bindParam(':prenom', $prenom);
$req->bindParam(':date_naissance', $date_naissance);
$req->bindParam(':code_identification', $code_identification);
$req->bindParam(':nationalite_id', $nationalite_id);
$req->bindParam(':specialite_id', $specialite_id);
$req->execute();