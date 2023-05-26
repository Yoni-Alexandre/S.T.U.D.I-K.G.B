<?php
include_once '../../config/database.php';
include_once '../../models/Agents/Agent.php';
include_once '../../views/layout/header.php';
?>
<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-center">Ajouter un agent</h1>
                <div class="col-12 col-md-auto text-center">
                    <div class="col"><a href="../../views/agents/agentsView.php" class="btn btn-warning">Revenir à la liste</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="../../views/agents/agentsValideAjoutView.php" method="post">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Nom de l'agent" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom de l'agent" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" name="date_naissance" id="date_naissance" placeholder="Date de naissance de l'agent" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="code_identification">Code d'identification</label>
                    <input type="text" name="code_identification" id="code_identification" placeholder="Code d'identification de l'agent" class="form-control mb-2">
                </div>

                <?php
                    global $pdo;

                    $req = $pdo->prepare('SELECT * FROM nationalites');
                    $req->execute();
                    $nationalites = $req->fetchAll();

                    echo '<div class="form-group">';
                    echo '<label for="nationalite_id">Nationalité</label>';
                    echo '<select name="nationalite_id" id="nationalite_id" class="form-control mb-2">';
                    echo '<option value="">Sélectionnez une nationalité</option>';
                    foreach ($nationalites as $nationalite) {
                        echo '<option value="' . $nationalite['id'] . '">' . $nationalite['pays'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';

                    $req = $pdo->prepare('SELECT * FROM specialites');
                    $req->execute();
                    $specialites = $req->fetchAll();

                    echo '<div class="form-group">';
                    echo '<label for="specialite_id">Spécialité</label>';
                    echo '<select name="specialite_id" id="specialite_id" class="form-control mb-2">';
                    echo '<option value="">Sélectionnez une spécialité</option>';
                    foreach ($specialites as $specialite) {
                        echo '<option value="' . $specialite['id'] . '">' . $specialite['nom'] . '</option>';
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
<?php include_once '../../views/layout/footer.php'; ?>