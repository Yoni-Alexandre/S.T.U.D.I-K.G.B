<?php
global $pdo;

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: error.php');
    exit();
}

$missionId = $_GET['id'];

$req = $pdo->prepare('SELECT * FROM missions WHERE id = ?');
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute([$missionId]);
$mission = $req->fetch();

if (!$mission) {
    header('Location: error.php');
    exit();
}

