<?php
global $pdo;
include_once 'header.php';
include_once 'connexionPdo.php';

$req = $pdo->prepare('SELECT * FROM agents');
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$agents = $req->fetchAll();
?>

<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-9">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Agents</h1>
            </div>
        </div>
        <div class="col-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
                <a href="agentFormType.php" class="btn btn-success"><i class="fas fa-plus-circle"></i>  Ajouter un agent</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-striped mt-5 text-center">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Code d'identification</th>
                    <th scope="col">Nationalité</th>
                    <th scope="col">Spécialité</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach ($agents as $agent) { ?>
                    <tr>
                        <td><?php echo $agent->nom; ?></td>
                        <td><?php echo $agent->prenom; ?></td>
                        <td><?php echo $agent->date_naissance; ?></td>
                        <td><?php echo $agent->code_identification; ?></td>
                        <td>
                            <?php
                            $nationalite_id = $agent->nationalite_id;
                            $req = $pdo->prepare('SELECT pays FROM nationalites WHERE id = ?');
                            $req->execute([$nationalite_id]);
                            $nationalite = $req->fetch();
                            if ($nationalite) {
                                echo $nationalite['pays'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $specialite_id = $agent->specialite_id ?? null;
                            if ($specialite_id) {
                                $req = $pdo->prepare('SELECT nom FROM specialites WHERE id = ?');
                                $req->execute([$specialite_id]);
                                $specialite = $req->fetch();
                                if ($specialite) {
                                    echo $specialite['nom'];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <a href='agentModifFormType.php?id=<?php echo $agent->id ?>' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                            <a type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#agentSupprModal' data-suppression='agentSuppr.php?id=<?php echo $agent->id ?>'><i class='fas fa-trash'></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="agentSupprModal" tabindex="-1" aria-labelledby="agentSupprModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ATTENTION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Voulez-vous vraiment supprimer cet agent ?</p>
            </div>
            <div class="modal-footer">
                <!-- Le href sera rempli par le script JS -->
                <a href="" class="btn btn-danger" id="btnSuppr">Supprimer</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Script pour la modale de confirmation de suppression
    let agentSupprModal = document.getElementById('agentSupprModal');
    agentSupprModal.addEventListener('show.bs.modal', function (event) {
        // Bouton de déclenchement de la modale
        let bouton = event.relatedTarget;
        // Récupération des attributs data-bs-*
        let agentSuppr = bouton.getAttribute('data-suppression');
        // Modification du contenu de la modale
        let btnSuppr = agentSupprModal.querySelector('#btnSuppr');
        btnSuppr.setAttribute('href', agentSuppr);
    });
</script>

<?php include_once 'footer.php'; ?>
