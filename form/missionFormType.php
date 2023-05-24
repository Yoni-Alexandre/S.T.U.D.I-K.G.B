<?php
include_once '../config/database.php';
include_once '../models/Accueil.php';
include_once '../views/layout/header.php';
?>
<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-center">Ajouter une mission</h1>
                <div class="col-12 col-md-auto text-center">
                    <div class="col"><a href="../views/missions/missionsView.php" class="btn btn-warning">Revenir à la liste</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="valideAjoutMission.php" method="post">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" placeholder="Titre de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" placeholder="Description de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="nom_code">Nom de code</label>
                    <input type="text" name="nom_code" id="nom_code" placeholder="Nom de code de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="pays">Pays</label>
                    <input type="text" name="pays" id="pays" placeholder="Pays de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="type_mission">Type</label>
                    <input type="text" name="type_mission" id="type_mission" placeholder="Type de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="statut">Statut</label>
                    <input type="text" name="statut" id="statut" placeholder="Statut de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="date_debut">Départ de la mission</label>
                    <input type="date" name="date_debut" id="date_debut" placeholder="Départ de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="date_fin">Fin de la mission</label>
                    <input type="date" name="date_fin" id="date_fin" placeholder="Fin de la mission" class="form-control mb-2">
                </div>

                <?php
                    global $pdo;
//                    include_once 'connexionPdo.php';

                    $req = $pdo->prepare('SELECT * FROM agents');
                    $req->execute();
                    $agents = $req->fetchAll();

                    $req = $pdo->prepare('SELECT * FROM contacts');
                    $req->execute();
                    $contacts = $req->fetchAll();

                    $req = $pdo->prepare('SELECT * FROM specialites');
                    $req->execute();
                    $specialites = $req->fetchAll();

                    $req = $pdo->prepare('SELECT * FROM planques');
                    $req->execute();
                    $planques = $req->fetchAll();

                    echo '<div class="form-group">';
                    echo '<label for="agent_id">Agent</label>';
                    echo '<select name="agent_id" id="agent_id" class="form-control mb-2">';
                    echo '<option value="">Sélectionnez un agent</option>';
                    foreach ($agents as $agent) {
                        echo '<option value="' . $agent['id'] . '">' . $agent['nom'] . ' ' . $agent['prenom'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<label for="contact_id">Contact</label>';
                    echo '<select name="contact_id" id="contact_id" class="form-control mb-2">';
                    echo '<option value="">Sélectionnez un contact</option>';
                    foreach ($contacts as $contact) {
                        echo '<option value="' . $contact['id'] . '">' . $contact['nom'] . ' ' . $contact['prenom'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<label for="specialite_requise">Spécialité</label>';
                    echo '<select name="specialite_requise" id="specialite_requise" class="form-control mb-2">';
                    echo '<option value="">Sélectionnez une spécialité</option>';
                    foreach ($specialites as $specialite) {
                        echo '<option value="' . $specialite['id'] . '">' . $specialite['nom'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<label for="cible_id">Cible</label>';
                    echo '<select name="cible_id" id="cible_id" class="form-control mb-2">';
                    echo '<option value="">Sélectionnez une cible</option>';
                    foreach ($contacts as $contact) {
                        echo '<option value="' . $contact['id'] . '">' . $contact['nom'] . ' ' . $contact['prenom'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';

                    echo '<div class="form-group">';
                    echo '<label for="planque_id">Planque</label>';
                    echo '<select name="planque_id" id="planque_id" class="form-control mb-2">';
                    echo '<option value="">Sélectionnez une planque</option>';
                    foreach ($planques as $planque) {
                        echo '<option value="' . $planque['id'] . '">' . $planque['code'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                ?>
                <div class="row">
                    <button type="submit" class="btn btn-success mt-5">Ajouter un agent</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once '../views/layout/footer.php'; ?>

