<?php
global $pdo;
$id = $_GET['id'];
$req = $pdo->prepare('SELECT * FROM agents WHERE id = :id');
$req->setFetchMode(PDO::FETCH_OBJ);
$req->bindParam(':id', $id, PDO::PARAM_INT);
$req->execute();
$agent = $req->fetch();


