<?php
global$pdo;
$req = $pdo->prepare('SELECT * FROM specialites');
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$specialites = $req->fetchAll();

