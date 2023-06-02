<body>

<div class="row mt-5">
    <div class="col-12 col-md-6 offset-md-3">
        <h2 class="text-center">Connexion</h2>
        <form method="post" action="../../index.php?uc=administration&action=connexion">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" class="form-control" id="username" name="username" required>

                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" required>

                <button type="submit" class="btn btn-primary mt-3">Se connecter</button>
            </div>
        </form>

        <p class="text-center">Se déconnecter ? <a href="../../index.php?uc=administration&action=logout">Cliquez ici</a>.</p>
    </div>
</div>

