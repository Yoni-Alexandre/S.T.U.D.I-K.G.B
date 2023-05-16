<?php
    global$pdo;
    include_once 'header.php';
    include_once 'connexionPdo.php';

    $id = $_POST['id'];
    $nationalite = $_POST['nationalite'];

    $req = $pdo->prepare('UPDATE nationalites SET pays = :nationalite WHERE id = :id');
    $req->bindParam(':id', $id);
    $req->bindParam(':nationalite', $nationalite);
    $req->execute();
?>

<body>
    <div class="mt-5 container">
        <?php
        if ($req->rowCount() == 1) {
            echo '<div class="alert alert-success" role="alert">La nationalité a bien été modifiée</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">La nationalité n\'a pas été modifiée</div>';
        }
        ?>
        <a href="nationalites.php" class="btn btn-warning">Revenir à la liste</a>

    </div>
</body>

<?php include_once 'footer.php'; ?>
