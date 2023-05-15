<?php
global $pdo;
include_once 'header.php';
include_once 'connexionPdo.php';

$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$date_naissance = $_POST['date_naissance'] ?? '';
$code_identification = $_POST['code_identification'] ?? '';
$nationalite = $_POST['nationalite'] ?? '';
$specialite = $_POST['specialite'] ?? '';

// Validation et formatage de la date de naissance
$datetime = DateTime::createFromFormat('Y-m-d', $date_naissance);
if ($datetime) {
    $date_naissance = $datetime->format('Y-m-d');
} else {
    $date_naissance = null;
}

// Validation de la spécialité (vérification si c'est un entier valide)
if ($specialite <= 0) {
    $specialite = null;
}

$req = $pdo->prepare("INSERT INTO agents (nom, prenom, date_naissance, code_identification, nationalite, specialite_id) VALUES (:nom, :prenom, :date_naissance, :code_identification, :nationalite, :specialite_id)");
$req->bindParam(':nom', $nom);
$req->bindParam(':prenom', $prenom);
$req->bindParam(':date_naissance', $date_naissance);
$req->bindParam(':code_identification', $code_identification);
$req->bindParam(':nationalite', $nationalite);
$req->bindParam(':specialite_id', $specialite);

$result = $req->execute();
?>


<div class="container mt-5">
    <?php if ($result) { ?>
        <?php $id = $pdo->lastInsertId(); ?>
        <div class="alert alert-success" role="alert">
            L'agent a bien été ajouté !
        </div>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            L'agent n'a pas été ajouté !
        </div>
    <?php } ?>
    <a href="agents.php" class="btn btn-warning">Revenir à la liste</a>

</div>

<?php include_once 'footer.php'; ?>
