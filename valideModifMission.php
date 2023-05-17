<?php
global$pdo;
include_once 'header.php';
include_once 'connexionPdo.php';

$titre = $_POST['titre'];
$description = $_POST['description'];
$nom_code = $_POST['nom_code'];
$pays = $_POST['pays'];
$type_mission = $_POST['type_mission'];
$statut = $_POST['statut'];
$specialite_requise = $_POST['specialite_requise'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$agent_id = $_POST['agent_id'];
$contact_id = $_POST['contact_id'];
$cible_id = $_POST['cible_id'];
$planque_id = $_POST['planque_id'];

$req = $pdo->prepare('INSERT INTO missions (titre, description, nom_code, pays, type_mission, statut, specialite_requise, date_debut, date_fin, agent_id, contact_id, cible_id, planque_id) VALUES (:titre, :description, :nom_code, :pays, :type_mission, :statut, :specialite_requise, :date_debut, :date_fin, :agent_id, :contact_id, :cible_id, :planque_id)');
$req->bindParam(':titre', $titre);
$req->bindParam(':description', $description);
$req->bindParam(':nom_code', $nom_code);
$req->bindParam(':pays', $pays);
$req->bindParam(':type_mission', $type_mission);
$req->bindParam(':statut', $statut);
$req->bindParam(':specialite_requise', $specialite_requise);
$req->bindParam(':date_debut', $date_debut);
$req->bindParam(':date_fin', $date_fin);
$req->bindParam(':agent_id', $agent_id);
$req->bindParam(':contact_id', $contact_id);
$req->bindParam(':cible_id', $cible_id);
$req->bindParam(':planque_id', $planque_id);
$req->execute();
?>

    <body>
<div class="mt-5 container">
    <?php
    if ($req->rowCount() == 1) {
        echo '<div class="alert alert-success" role="alert">La mission a bien été modifiée</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">La mission n\'a pas été modifiée</div>';
    }
    ?>
    <a href="missions.php" class="btn btn-warning">Revenir à la liste</a>

</div>


<?php include_once 'footer.php'; ?>