<?php
global$pdo;
include_once 'header.php';
include_once 'connexionPdo.php';
//agents
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dateNaissance = $_POST['date_naissance'];
$codeIdentification = $_POST['code_identification'];
$nationaliteId = $_POST['nationalite_id'];
$specialiteId = $_POST['specialite_id'];

$req = $pdo->prepare('INSERT INTO agents (nom, prenom, date_naissance, code_identification, nationalite_id, specialite_id) VALUES (:nom, :prenom, :date_naissance, :code_identification, :nationalite_id, :specialite_id)');
$req->bindParam(':nom', $nom);
$req->bindParam(':prenom', $prenom);
$req->bindParam(':date_naissance', $dateNaissance);
$req->bindParam(':code_identification', $codeIdentification);
$req->bindParam(':nationalite_id', $nationaliteId);
$req->bindParam(':specialite_id', $specialiteId);
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
</body>

<?php include_once 'footer.php'; ?>
