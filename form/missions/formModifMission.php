<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-center">Modifier une mission</h1>
                <div class="col-12 col-md-auto text-center">
                    <div class="col"><a href="index.php?uc=mission&action=listeMissions" class="btn btn-warning">Revenir à la liste</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="../index.php?uc=mission&action=valideModif" method="post">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" placeholder="Modifier le titre" class="form-control mb-2" value="<?php echo $mission->titre; ?>">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" placeholder="Modifier la description" class="form-control mb-2" value="<?php echo $mission->description; ?>">
                </div>

                <div class="form-group">
                    <label for="nom_code">Nom de code</label>
                    <input type="text" name="nom_code" id="nom_code" placeholder="Modifier le nom de code" class="form-control mb-2" value="<?php echo $mission->nom_code; ?>">
                </div>

                <div class="form-group">
                    <label for="pays">Pays</label>
                    <input type="text" name="pays" id="pays" placeholder="Modifier le pays" class="form-control mb-2" value="<?php echo $mission->pays; ?>">
                </div>

                <div class="form-group">
                    <label for="type_mission">Type de mission</label>
                    <input type="text" name="type_mission" id="type_mission" placeholder="Modifier le type de mission" class="form-control mb-2" value="<?php echo $mission->type_mission; ?>">
                </div>

                <div class="form-group">
                    <label for="statut">Statut</label>
                    <input type="text" name="statut" id="statut" placeholder="Modifier le statut" class="form-control mb-2" value="<?php echo $mission->statut; ?>">
                </div>

                <div class="form-group">
                    <label for="date_debut">Date de début</label>
                    <input type="date" name="date_debut" id="date_debut" placeholder="Modifier la date" class="form-control mb-2" value="<?php echo $mission->date_debut; ?>">
                </div>

                <div class="form-group">
                    <label for="date_fin">Date de fin</label>
                    <input type="date" name="date_fin" id="date_fin" placeholder="Modifier la date" class="form-control mb-2" value="<?php echo $mission->date_fin; ?>">
                </div>
                <?php

                echo '<div class="form-group">';
                echo '<label for="agent_id">Agent</label>';
                echo '<select name="agent_id" id="agent_id" class="form-control mb-2">';
                echo '<option value="">Sélectionnez un agent</option>';
                foreach ($agents as $agent) {
                    echo '<option value="' . $agent->id . '">' . $agent->nom . ' ' . $agent->prenom . '</option>';
                }
                echo '</select>';
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label for="contact_id">Contact</label>';
                echo '<select name="contact_id" id="contact_id" class="form-control mb-2">';
                echo '<option value="">Sélectionnez un contact</option>';
                foreach ($contacts as $contact) {
                    echo '<option value="' . $contact['id'] . '">' . $contact['nom'] . ' ' . $contact['prenom'] . '</option>';
                }
                echo '</select>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="cible_id">Cible</label>';
                echo '<select name="cible_id" id="cible_id" class="form-control mb-2">';
                echo '<option value="">Sélectionnez une cible</option>';
                foreach ($cibles as $cible) {
                    echo '<option value="' . $cible['id'] . '">' . $cible['nom'] . ' ' . $cible['prenom'] . '</option>';
                }
                echo '</select>';
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label for="specialite_requise">Spécialité requise</label>';
                echo '<select name="specialite_requise" id="specialite_requise" class="form-control mb-2">';
                echo '<option value="">Sélectionnez une spécialité</option>';
                foreach ($specialites as $specialite) {
                    echo '<option value="' . $specialite->id . '">' . $specialite->nom . '</option>';
                }
                echo '</select>';
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label for="planque_id">Planque</label>';
                echo '<select name="planque_id" id="planque_id" class="form-control mb-2">';
                echo '<option value="">Sélectionnez une planque</option>';
                foreach ($planques as $planque) {
                    echo '<option value="' . $planque->id . '">' . $planque->code . ' - '. $planque->adresse . ' - '. $planque->pays . ' - '. $planque->type .'</option>';
                }
                echo '</select>';
                echo '</div>';
                ?>

                <input type="hidden" id="id" name="id" value="<?php echo $mission->id; ?>">

                <div class="row">
                    <button type="submit" class="btn btn-success mt-5">Modifier une mission</button>
                </div>
            </form>
        </div>
    </div>
</div>