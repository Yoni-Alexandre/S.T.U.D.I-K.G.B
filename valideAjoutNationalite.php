<?php
global$pdo;
include_once 'header.php';
include_once 'connexionPdo.php';

$nationalite = $_POST['nationalite'];

$req = $pdo->prepare('INSERT INTO nationalites (pays) VALUES (:nationalite)');
$req->bindParam(':nationalite', $nationalite);
$req->execute();
?>

<body>
    <div class="mt-5 container">
        <?php
            if ($req->rowCount() == 1) {
                echo '<div class="alert alert-success" role="alert">La nationalité a bien été ajoutée</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">La nationalité n\'a pas été ajoutée</div>';
            }
        ?>
        <a href="nationalites.php" class="btn btn-warning">Revenir à la liste</a>

    </div>


<?php include_once 'footer.php'; ?>
