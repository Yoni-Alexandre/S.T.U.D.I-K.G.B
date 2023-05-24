<?php
include_once '../../config/database.php';
include_once '../../models/Missions/MissionModif.php';
include_once '../../views/layout/header.php';
?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center"><?php echo $mission->titre; ?></h2>
                    <p><strong>Description :</strong><?php echo $mission->description; ?></p>
                    <p><strong>Nom de code :</strong> <?php echo $mission->nom_code; ?></p>
                    <p><strong>Pays :</strong> <?php echo $mission->pays; ?></p>
                    <p><strong>Type :</strong> <?php echo $mission->type_mission; ?></p>
                    <p><strong>Statut :</strong> <?php echo $mission->statut; ?></p>
                    <p><strong>Date de début :</strong> <?php echo $mission->date_debut; ?></p>
                    <p><strong>Date de fin :</strong> <?php echo $mission->date_fin; ?></p>
                    <p><strong>Agent :</strong>
                        <?php
                        $agent_id = $mission->agent_id;
                        $req = $pdo->prepare('SELECT nom FROM agents WHERE id = ?');
                        $req->execute([$agent_id]);
                        $agent = $req->fetch();
                        echo $agent['nom'];
                        ?>
                    </p>
                    <p><strong>Contact :</strong>
                        <?php
                        $contact_id = $mission->contact_id;
                        $req = $pdo->prepare('SELECT nom FROM contacts WHERE id = ?');
                        $req->execute([$contact_id]);
                        $contact = $req->fetch();
                        echo $contact['nom'];
                        ?>
                    </p>
                    <p><strong>Cible :</strong>
                        <?php
                        $cible_id = $mission->cible_id;
                        $req = $pdo->prepare('SELECT nom FROM cibles WHERE id = ?');
                        $req->execute([$cible_id]);
                        $cible = $req->fetch();
                        echo $cible['nom'];
                        ?>
                    </p>
                    <p><strong>Planque :</strong>
                        <?php
                        $planque_id = $mission->planque_id;
                        $req = $pdo->prepare('SELECT code FROM planques WHERE id = ?');
                        $req->execute([$planque_id]);
                        $planque = $req->fetch();
                        echo $planque['code'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once '../layout/footer.php'; ?>
