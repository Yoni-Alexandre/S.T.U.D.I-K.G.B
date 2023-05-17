<?php include_once 'header.php'; ?>
<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-center">Ajouter une mission</h1>
                <div class="col-12 col-md-auto text-center">
                    <div class="col"><a href="missions.php" class="btn btn-warning">Revenir à la liste</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" placeholder="Titre de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" placeholder="Description de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="nomDeCode">Nom de code</label>
                    <input type="text" name="nomDeCode" id="nomDeCode" placeholder="Nom de code de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="pays">Pays</label>
                    <input type="text" name="pays" id="pays" placeholder="Pays de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="typeMission">Type</label>
                    <input type="text" name="typeMission" id="typeMission" placeholder="Type de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="statut">Statut</label>
                    <input type="text" name="statut" id="statut" placeholder="Statut de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="specialiteRequise">Spécialité requise</label>
                    <input type="text" name="specialiteRequise" id="specialiteRequise" placeholder="Spécialité requise de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="dateDebut">Départ de la mission</label>
                    <input type="date" name="dateDebut" id="dateDebut" placeholder="Départ de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="dateFin">Fin de la mission</label>
                    <input type="date" name="dateFin" id="dateFin" placeholder="Fin de la mission" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <label for="agent">Agent</label>
                    <select name="agent" id="agent" class="form-control mb-2">
                        <option value="">Sélectionnez un agent</option>
                        <option value="agent1">Agent 1</option>
                        <option value="agent2">Agent 2</option>
                        <option value="agent3">Agent 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <select name="contact" id="contact" class="form-control mb-2">
                        <option value="">Sélectionnez un contact</option>
                        <option value="contact1">Contact 1</option>
                        <option value="contact2">Contact 2</option>
                        <option value="contact3">Contact 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cible">Cible</label>
                    <select name="cible" id="cible" class="form-control mb-2">
                        <option value="">Sélectionnez une cible</option>
                        <option value="cible1">Cible 1</option>
                        <option value="cible2">Cible 2</option>
                        <option value="cible3">Cible 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="planque">Planque</label>
                    <select name="planque" id="planque" class="form-control mb-2">
                        <option value="">Sélectionnez une planque</option>
                        <option value="planque1">Planque 1</option>
                        <option value="planque2">Planque 2</option>
                        <option value="planque3">Planque 3</option>
                    </select>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-success mt-5">Ajouter un agent</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>

