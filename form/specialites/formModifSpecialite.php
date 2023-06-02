<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-center">Modifier une nationalité</h1>
                <div class="col-12 col-md-auto text-center">
                    <div class="col"><a href="../../index.php?uc=specialite&action=listeSpecialites" class="btn btn-warning">Revenir à la liste</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="../../index.php?uc=specialite&action=valideModif" method="post">
                <div class="form-group">
                    <label for="specialite">Spécialité</label>
                    <input type="text" name="specialite" id="specialite" placeholder="Modifier une spécialité" class="form-control mb-2" value="<?php echo $specialite->nom; ?>">
                </div>
                <input type="hidden" id="id" name="id" value="<?php echo $specialite->id; ?>">

                <div class="row">
                    <button type="submit" class="btn btn-success mt-5">Modifier une nationalité</button>
                </div>
            </form>
        </div>
    </div>
</div>