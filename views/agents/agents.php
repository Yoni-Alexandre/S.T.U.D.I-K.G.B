<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-9">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Agents</h1>
            </div>
        </div>
        <div class="col-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-4 mb-3 border-bottom">
                <a href="../../index.php?uc=agent&action=add" class="btn btn-success"><i class="fas fa-plus-circle"></i>  Ajouter un agent</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <table class="table table-hover table-striped mt-5 text-center">
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Date de naissance</th>
                        <th scope="col">Code d'identification</th>
                        <th scope="col">Nationalité</th>
                        <th scope="col">Spécialité</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php foreach ($agents as $agent) { ?>
                        <tr>
                            <td><?php echo $agent->nom; ?></td>
                            <td><?php echo $agent->prenom; ?></td>
                            <td><?php echo $agent->date_naissance; ?></td>
                            <td><?php echo $agent->code_identification; ?></td>
                            <td><?php echo $agent->nationalite_id; ?></td>
                            <td><?php echo $agent->specialite_id; ?></td>
                            <td>
                                <a href="../../index.php?uc=agent&action=update&id=<?php echo $agent->id; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="../../index.php?uc=agent&action=delete&id=<?php echo $agent->id; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>