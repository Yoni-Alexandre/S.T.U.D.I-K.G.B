<?php
global $pdo;
include_once 'header.php';
include_once 'connexionPdo.php';
$req = $pdo->prepare('SELECT * FROM missions');
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$missions = $req->fetchAll();
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
                    <h2 class="text-center">Liste des missions</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Description</th>
                                <th scope="col">Nom de code</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Type</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Date de fin</th>
                                <th scope="col">Agent</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Cible</th>
                                <th scope="col">Planque</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($missions as $mission) { ?>
                                <tr>
                                    <th scope="row">
                                        <a href="mission_detail.php?id=<?php echo $mission->id; ?>" class="link-primary link-mission-studi-kgb">
                                            <?php echo $mission->titre; ?>
                                        </a>
                                    </th>
                                    <td><?php echo $mission->description; ?></td>
                                    <td><?php echo $mission->nom_code; ?></td>
                                    <td><?php echo $mission->pays; ?></td>
                                    <td><?php echo $mission->type_mission; ?></td>
                                    <td><?php echo $mission->statut; ?></td>
                                    <td><?php echo $mission->date_debut; ?></td>
                                    <td><?php echo $mission->date_fin; ?></td>
                                    <td>
                                        <?php
                                        $agent_id = $mission->agent_id;
                                        $req = $pdo->prepare('SELECT nom FROM agents WHERE id = ?');
                                        $req->execute([$agent_id]);
                                        $agent = $req->fetch();
                                        echo $agent['nom'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $contact_id = $mission->contact_id;
                                        $req = $pdo->prepare('SELECT nom FROM contacts WHERE id = ?');
                                        $req->execute([$contact_id]);
                                        $contact = $req->fetch();
                                        echo $contact['nom'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cible_id = $mission->cible_id;
                                        $req = $pdo->prepare('SELECT nom FROM cibles WHERE id = ?');
                                        $req->execute([$cible_id]);
                                        $cible = $req->fetch();
                                        echo $cible['nom'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $planque_id = $mission->planque_id;
                                        $req = $pdo->prepare('SELECT code FROM planques WHERE id = ?');
                                        $req->execute([$planque_id]);
                                        $planque = $req->fetch();
                                        echo $planque['code'];
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once 'footer.php'; ?>
