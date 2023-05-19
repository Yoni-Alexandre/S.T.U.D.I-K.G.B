<?php include_once 'header.php'; ?>
<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-center">Ajouter une nationalité</h1>
                <div class="col-12 col-md-auto text-center">
                    <div class="col"><a href="nationalites.php" class="btn btn-warning">Revenir à la liste</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="valideAjoutNationalite.php" method="post">
                <div class="form-group">
                    <label for="nationalite">Nationalité</label>
                    <input type="text" name="nationalite" id="nationalite" placeholder="Ajouter une nationalité" class="form-control mb-2">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success mt-5">Ajouter une nationalité</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>

