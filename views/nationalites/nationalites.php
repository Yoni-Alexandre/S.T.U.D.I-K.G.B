<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-9">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Nationalités</h1>
            </div>
        </div>
        <div class="col-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
                <a href="../../index.php?uc=nationalite&action=add" class="btn btn-success"><i class="fas fa-plus-circle"></i>  Ajouter une nationalité</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-striped mt-5 text-center">
                <thead>
                <tr>
                    <th scope="col">Pays</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach ($nationalites as $nationalite) { ?>
                    <tr>
                        <td><?php echo $nationalite->pays; ?></td>
                        <td>
                            <a href="../../index.php?uc=nationalite&action=update&id=<?php echo $nationalite->id; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#supprModal' data-suppression='../../index.php?uc=nationalite&action=delete&id=<?php echo $nationalite->id ?>'><i class='fas fa-trash'></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'views/modal/modal.php'; ?>
    <?php include 'views/pagination/paginationNationalite.php'; ?>
</div>


