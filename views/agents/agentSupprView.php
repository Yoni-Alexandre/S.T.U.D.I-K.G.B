<?php
include_once '../../config/database.php';
include_once '../../models/Agents/AgentSuppr.php';
include_once '../layout/header.php';
?>
<body>
<div class="mt-5 container">
    <?php
    if ($req->rowCount() == 1) {
        echo '<div class="alert alert-success" role="alert">L\'agent a bien été supprimée</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">L\'agent n\'a pas été supprimée</div>';
    }
    ?>
    <a href="../agents/agentsView.php" class="btn btn-warning">Revenir à la liste</a>

</div>


<?php include_once '../layout/footer.php'; ?>
