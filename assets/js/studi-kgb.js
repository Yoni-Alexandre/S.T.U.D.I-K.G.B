// Script pour la modale de confirmation de suppression
let supprModal = document.getElementById('supprModal')
supprModal.addEventListener('show.bs.modal', function (event)
{
    // Bouton de déclenchement de la modale
    let bouton = event.relatedTarget
    // Récupération des attributs data-bs-*
    let agentSuppr = bouton.getAttribute('data-suppression')
    // Modification du contenu de la modale
    let btnSuppr = supprModal.querySelector('#btnSuppr')
    btnSuppr.setAttribute('href', agentSuppr)
})