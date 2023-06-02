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
                <a href="../../index.php?uc=specialite&action=add" class="btn btn-success"><i class="fas fa-plus-circle"></i>  Ajouter une spécialité</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-striped mt-5 text-center">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach ($specialites as $specialite) { ?>
                    <tr>
                        <td><?php echo $specialite->nom; ?></td>
                        <td>
                            <a href="../../index.php?uc=specialite&action=update&id=<?php echo $specialite->id; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="../../index.php?uc=specialite&action=delete&id=<?php echo $specialite->id; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

