
<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-9">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Missions</h1>
            </div>
        </div>
        <div class="col-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
                <a href="../index.php?uc=mission&action=add" class="btn btn-success"><i class="fas fa-plus-circle"></i>  Ajouter une mission</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-striped mt-5 text-center">
                <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">description</th>
                    <th scope="col">Nom de code</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Type de mission</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Spécialisation</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de Fin</th>
                    <th scope="col">Agent</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Cible</th>
                    <th scope="col">Planque</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach ($missions as $mission) { ?>
                    <tr>
                        <td><?php echo $mission->titre; ?></td>
                        <td><?php echo $mission->description; ?></td>
                        <td><?php echo $mission->nom_code; ?></td>
                        <td><?php echo $mission->pays; ?></td>
                        <td><?php echo $mission->type_mission; ?></td>
                        <td><?php echo $mission->statut; ?></td>
                        <td><?php echo $mission->specialite_requise; ?></td>
                        <td><?php echo $mission->date_debut; ?></td>
                        <td><?php echo $mission->date_fin; ?></td>

                        <td><?php echo $mission->specialite_requise; ?></td>
                        <td><?php  echo $mission->contact_id; ?></td>
                        <td><?php echo $mission->cible_id; ?></td>
                        <td><?php echo $mission->planque_id; ?></td>

                        <td>
                            <a href="#" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                            <a type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#nationaliteSupprModal' data-suppression=''><i class='fas fa-trash'></i></a>
                        </td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="nationaliteSupprModal" tabindex="-1" aria-labelledby="nationaliteSupprModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ATTENTION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Voulez-vous vraiment supprimer cette nationalité ?</p>
            </div>
            <div class="modal-footer">
                <!--                Le href sera rempli par le script JS-->
                <a href="" class="btn btn-danger" id="btnSuppr">Supprimer</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    // Script pour la modale de confirmation de suppression
    let nationaliteSupprModal = document.getElementById('nationaliteSupprModal')
    nationaliteSupprModal.addEventListener('show.bs.modal', function (event) {
        // Bouton de déclenchement de la modale
        let bouton = event.relatedTarget
        // Récupération des attributs data-bs-*
        let nationaliteSuppr = bouton.getAttribute('data-suppression')
        // Modification du contenu de la modale
        let btnSuppr = nationaliteSupprModal.querySelector('#btnSuppr')
        btnSuppr.setAttribute('href', nationaliteSuppr)
    })
</script>

