<?php
global $pdo;
include_once 'header.php';
include_once 'connexionPdo.php';
$req = $pdo->prepare('SELECT * FROM missions');
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$mission = $req->fetchAll();

if (!$mission) {
    header('Location: error.php');
    exit();
}
?>

<body>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mb-2 mt-5 text-center mx-auto">
                <img src="assets/images/Emblema_del_KGB.png" class="img-fluid" alt="Logo" style="max-width: 200px; height: auto;">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">s.t.u.d.i | k.g.b</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                        for ($i = 0; $i < 1; $i++) {
                            $m = $mission[$i];
                            echo '<h2 class="text-center">' . $m->titre . '</h2>';
                            echo '<p>' . $m->description . '</p>';
                            echo '<p><strong>Nom de code :</strong> ' . $m->nom_code . '</p>';
                            echo '<p><strong>Pays :</strong> ' . $m->pays . '</p>';
                            echo '<p><strong>Type :</strong> ' . $m->type_mission . '</p>';
                            echo '<p><strong>Statut :</strong> ' . $m->statut . '</p>';
                            echo '<p><strong>Date de début :</strong> ' . $m->date_debut . '</p>';
                            echo '<p><strong>Date de fin :</strong> ' . $m->date_fin . '</p>';
                            echo '<p><strong>Agent :</strong> ';
                            $agent_id = $m->agent_id;
                            $req = $pdo->prepare('SELECT nom FROM agents WHERE id = ?');
                            $req->execute([$agent_id]);
                            $agent = $req->fetch();
                            echo $agent['nom'] . '</p>';
                            echo '<p><strong>Contact :</strong> ';
                            $contact_id = $m->contact_id;
                            $req = $pdo->prepare('SELECT nom FROM contacts WHERE id = ?');
                            $req->execute([$contact_id]);
                            $contact = $req->fetch();
                            echo $contact['nom'] . '</p>';
                            echo '<p><strong>Cible :</strong> ';
                            $cible_id = $m->cible_id;
                            $req = $pdo->prepare('SELECT nom FROM cibles WHERE id = ?');
                            $req->execute([$cible_id]);
                            $cible = $req->fetch();
                            echo $cible['nom'] . '</p>';
                            echo '<p><strong>Planque :</strong> ';
                            $planque_id = $m->planque_id;
                            $req = $pdo->prepare('SELECT code FROM planques WHERE id = ?');
                            $req->execute([$planque_id]);
                            $planque = $req->fetch();
                            echo $planque['code'] . '</p>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include_once 'footer.php'; ?>