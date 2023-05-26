<?php
global $pdo;
$id = $_GET['id'];
$req = $pdo->prepare('DELETE FROM agents WHERE id = :id');
$req->bindParam(':id', $id);
$req->execute();




