<?php
global $pdo;
include 'header.php';
include_once 'connexionPdo.php';
$id = $_GET['id'];
$req = $pdo->prepare('DELETE FROM missions WHERE id = :id');
$req->bindParam(':id', $id);
$req->execute();

?>

<body>
<div class="mt-5 container">
    <?php
    if ($req->rowCount() == 1) {
        echo '<div class="alert alert-success" role="alert">La mission a bien été supprimée</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">La mission n\'a pas été supprimée</div>';
    }
    ?>
    <a href="missions.php" class="btn btn-warning">Revenir à la liste</a>

</div>


<?php include_once 'footer.php'; ?>

