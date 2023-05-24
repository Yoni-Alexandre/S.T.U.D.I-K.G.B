<?php
global$pdo;
$req = $pdo->prepare('SELECT * FROM nationalites');
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$nationalites = $req->fetchAll();

