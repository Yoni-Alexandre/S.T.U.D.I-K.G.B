<?php
global $req;
include_once '../../config/database.php';
include_once '../../models/Agents/AgentValidModif.php';
include_once '../layout/header.php';
?>

<body>
<div class="mt-5 container">
    <?php
    $req->execute();
        echo '<div class="alert alert-success" role="alert">Les informations de l\'agent ont été mises à jour avec succès.</div>';
    ?>
    <a href="../agents/agentsView.php" class="btn btn-warning">Revenir à la liste</a>

</div>

<?php include_once '../layout/footer.php'; ?>