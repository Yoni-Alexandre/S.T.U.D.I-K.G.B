<body>
<div class="container">
    <h1 class="mt-4">Résultats de la recherche</h1>

    <?php if (!empty($missions)): ?>
        <ul class="list-group">
            <?php foreach ($missions as $mission): ?>
                <li class="list-group-item">
                    <h4 class="mb-1"><?php echo $mission->titre; ?></h4>
                    <p class="mb-1"><?php echo $mission->description; ?></p>
                    <p class="mb-1"><?php echo $mission->nom_code; ?></p>
                    <p class="mb-1"><?php echo $mission->pays; ?></p>
                    <a href="../../index.php?uc=mission&action=detail&id=<?php echo $mission->id; ?>" class="btn btn-primary">Détails</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun résultat trouvé.</p>
    <?php endif; ?>

    <a href="../../index.php" class="btn btn-primary mt-4">Retour à la page d'accueil</a>
</div>
</body>
