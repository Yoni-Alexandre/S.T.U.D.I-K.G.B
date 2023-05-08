<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.T.U.D.I | K.G.B</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/studi-kgb.css">
</head>

<header>
    <!--**** START - NAVBAR ****-->
    <nav class="navbar navbar-expand-lg bg-studi-kgb">
        <div class="container-fluid">
            <a class="navbar-brand title-studi-kgb" href="#">S.T.U.D.I | K.G.B</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active title-studi-kgb" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active title-studi-kgb" aria-current="page" href="#">Administration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--**** END - NAVBAR ****-->
</header>

<!--**** BODY ****-->
<body>
<main>
    <div class="container">
        <div class="row">
            <div class="col-4 mb-2 mt-5 text-center mx-auto">
                <img src="assets/images/Emblema_del_KGB.png" class="img-fluid " alt="Logo" style="width: 200px; height: 200px;">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>s.t.u.d.i | k.g.b</h1>
                <div class="row">
                    <div class="col-12">
                        <h2>Liste des missions</h2>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nom de la mission</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Date de fin</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Agent</th>
                                <th scope="col">Spécialité</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Note</th>
                                <th scope="col">Statut</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"> <a href="#" class="link-primary link-mission-studi-kgb">Mission 1</a></th>
                                <td>01/01/2021</td>
                                <td>01/02/2021</td>
                                <td>France</td>
                                <td>James Bond</td>
                                <td>Agent secret</td>
                                <td>Jacques Martin</td>
                                <td>Très important</td>
                                <td>En cours</td>
                            </tr>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>

</main>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-center">Yoni-Alexandre Brault - S.T.U.D.I | K.G.B - 2023</p>
            </div>
        </div>
    </div>
</footer>

<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>