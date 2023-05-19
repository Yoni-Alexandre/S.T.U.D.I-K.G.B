<?php
global$pdo;
include_once 'header.php';
include_once 'connexionPdo.php';

$specialite = $_POST['specialite'];

$req = $pdo->prepare('INSERT INTO specialites (nom) VALUES (:specialite)');
$req->bindParam(':specialite', $specialite);
$req->execute();
?>

<body>
<div class="mt-5 container">
    <?php
    if ($req->rowCount() == 1) {
        echo '<div class="alert alert-success" role="alert">La spécialité a bien été ajoutée</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">La spécialité n\'a pas été ajoutée</div>';
    }
    ?>
    <a href="specialites.php" class="btn btn-warning">Revenir à la liste</a>

</div>


<?php include_once 'footer.php'; ?>