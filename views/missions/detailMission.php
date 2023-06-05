<body>
<div class="container">

    <h1 class="mt-4">Détail de la mission</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p class="card-text"><strong>Titre:</strong> <?php echo $mission->titre; ?></p>
            <p class="card-text"><strong>Description:</strong> <?php echo $mission->description; ?></p>
            <p class="card-text"><strong>Nom/Code:</strong> <?php echo $mission->nom_code; ?></p>
            <p class="card-text"><strong>Pays:</strong> <?php echo $mission->pays; ?></p>
            <p class="card-text"><strong>Type de mission:</strong> <?php echo $mission->type_mission; ?></p>
            <p class="card-text"><strong>Date de début:</strong> <?php echo $mission->date_debut; ?></p>
            <p class="card-text"><strong>Date de fin:</strong> <?php echo $mission->date_fin; ?></p>
            <p class="card-text"><strong>Statut:</strong> <?php echo $mission->statut; ?></p>
            <p class="card-text"><strong>Spécialité requise:</strong> <?php echo $mission->specialite_requise; ?></p>
        </div>
    </div>

    <a href="../../index.php" class="btn btn-primary mt-4">Retour à la page d'accueil</a>
</div>
</body>

