<?php include_once 'header.php'; ?>
<div class="container">
    <!-- Formulaire d'ajout des agents -->
    <div class="row pt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-center">Ajouter un agent</h1>
                <div class="col-12 col-md-auto text-center">
                    <div class="col"><a href="agents.php" class="btn btn-warning">Revenir à la liste</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="#" method="post">
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
                <div class="form-group">
                    <label for="nationalite">Nationalité</label>
                    <input type="text" name="nationalite" id="nationalite" placeholder="Nationalité de l'agent" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="specialite">Spécialité</label>
                    <input type="text" name="specialite" id="specialite" placeholder="Spécialité de l'agent" class="form-control mb-2">
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-success mt-5">Ajouter un agent</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>