<?php
include_once 'header.php';
include_once 'connexionPdo.php';

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
?>

<body>
<div class="mt-5 container">
    <?php
    if ($req->rowCount() == 1) {
        echo '<div class="alert alert-success" role="alert">L\'agent a bien été modifié</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">L\'agent n\'a pas été modifié</div>';
    }
    ?>
    <a href="agents.php" class="btn btn-warning">Revenir à la liste</a>

</div>

<?php include_once 'footer.php'; ?>
