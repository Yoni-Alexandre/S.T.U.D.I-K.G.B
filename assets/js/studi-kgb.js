<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="missionSupprModal" tabindex="-1" aria-labelledby="missionSupprModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ATTENTION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Voulez-vous vraiment supprimer cette mission ?</p>
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
    let missionSupprModal = document.getElementById('missionSupprModal')
    missionSupprModal.addEventListener('show.bs.modal', function (event) {
    // Bouton de déclenchement de la modale
    let bouton = event.relatedTarget
    // Récupération des attributs data-bs-*
    let missionSuppr = bouton.getAttribute('data-suppression')
    // Modification du contenu de la modale
    let btnSuppr = missionSupprModal.querySelector('#btnSuppr')
    btnSuppr.setAttribute('href', missionSuppr)
})