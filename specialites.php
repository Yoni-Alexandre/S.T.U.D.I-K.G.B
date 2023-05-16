<?php
global$pdo;
include_once 'header.php';
include_once 'connexionPdo.php';
$req = $pdo->prepare('SELECT * FROM specialites');
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$specialites = $req->fetchAll();
?>

<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-9">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Spécialités</h1>
            </div>
        </div>
        <div class="col-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
                <a href="agentFormType.php" class="btn btn-success"><i class="fas fa-plus-circle"></i>  Ajouter une spécialité</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-striped mt-5 text-center">
                <thead>
                <tr>
                    <th scope="col">Spécialités</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach ($specialites as $specialite) { ?>
                    <tr>
                        <td><?php echo $specialite->nom; ?></td>
                        <td>
                            <a href="#" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

<?php include_once 'footer.php'; ?>