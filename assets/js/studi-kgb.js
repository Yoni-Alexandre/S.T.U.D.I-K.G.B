// Script pour la modale de confirmation de suppression
let missionSupprModal = document.getElementById('missionSupprModal')
missionSupprModal.addEventListener('show.bs.modal', function (event)
{
    // Bouton de déclenchement de la modale
    let bouton = event.relatedTarget
    // Récupération des attributs data-bs-*
    let missionSuppr = bouton.getAttribute('data-suppression')
    // Modification du contenu de la modale
    let btnSuppr = missionSupprModal.querySelector('#btnSuppr')
    btnSuppr.setAttribute('href', missionSuppr)
})