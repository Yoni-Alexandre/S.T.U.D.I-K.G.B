<?php
include_once '../config/database.php';
include_once '../models/Nationalite.php';
include_once 'layout/header.php';
?>

<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-9">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Nationalités</h1>
            </div>
        </div>
        <div class="col-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
                <a href="../form/nationaliteFormType.php" class="btn btn-success"><i class="fas fa-plus-circle"></i>  Ajouter une nationalité</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-striped mt-5 text-center">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nationalité</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                    foreach ($nationalites as $nationalite) {
                        echo "<tr>";
                            echo "<td>$nationalite->id</td>";
                            echo "<td>$nationalite->pays</td>";
                            echo "
                                <td>
                                    <a href='nationaliteModifFormType.php?id=$nationalite->id' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                                    <a type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#nationaliteSupprModal' data-suppression='nationaliteSuppr.php?id=$nationalite->id'><i class='fas fa-trash'></i></a>   
                                </td>";
                        echo "</tr>";
                    }
                ?>
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

<?php include_once 'layout/footer.php'; ?>
