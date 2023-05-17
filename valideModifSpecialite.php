<?php
global$pdo;
include_once 'header.php';
include_once 'connexionPdo.php';

$id = $_POST['id'];
$specialite= $_POST['specialite'];

$req = $pdo->prepare('UPDATE specialites SET nom = :specialite WHERE id = :id');
$req->bindParam(':id', $id);
$req->bindParam(':specialite', $specialite);
$req->execute();
?>

<body>
<div class="mt-5 container">
    <?php
    if ($req->rowCount() == 1) {
        echo '<div class="alert alert-success" role="alert">La spécialité a bien été modifiée</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">La spécialité n\'a pas été modifiée</div>';
    }
    ?>
    <a href="specialites.php" class="btn btn-warning">Revenir à la liste</a>

</div>


<?php include_once 'footer.php'; ?>
