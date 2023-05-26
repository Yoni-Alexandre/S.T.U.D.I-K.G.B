<?php
include_once '../../config/database.php';
include_once '../../models/Agents/AgentValidAjout.php';
include_once '../layout/header.php';
?>

<body>
<div class="mt-5 container">
    <?php
    if ($req->rowCount() == 1) {
        echo '<div class="alert alert-success" role="alert">L\'agent a bien été crée</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">L\'agent n\'a pas été crée</div>';
    }
    ?>
    <a href="../agents/agentsView.php" class="btn btn-warning">Revenir à la liste</a>

</div>

<?php include_once '../layout/footer.php'; ?>