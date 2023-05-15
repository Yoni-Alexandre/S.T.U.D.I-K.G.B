  <!--console d'administration des missions et des agents-->
<?php
global$pdo;
include_once 'header.php';
include_once 'connexionPdo.php';
$req = $pdo->prepare('SELECT * FROM agents');
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$agents = $req->fetchAll();
?>

<body>
<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">-->
<!--    <a class="navbar-brand" href="#">Console d'administration</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <div class="collapse navbar-collapse" id="navbarNav">-->
<!--        <ul class="navbar-nav">-->
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="#">Accueil</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Utilisateurs</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Paramètres</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-4 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="agents.php">
                            <span data-feather="home"></span>
                            Agents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="missions.php">
                            <span data-feather="users"></span>
                            Missions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="settings"></span>
                            Nationalités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="settings"></span>
                            Spécialités
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <main role="main" class="col-lg-9 col-md-8 ml-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tableau de bord</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agents</h5>
                            <p class="card-text">Gérez les agents de l'application.</p>
                            <a href="agents.php" class="btn btn-primary">Accéder</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nationalités</h5>
                            <p class="card-text">Gérez les nationalités des agents .</p>
                            <a href="#" class="btn btn-primary">Accéder</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Spécialités</h5>
                            <p class="card-text">Gérez les spécialités.</p>
                            <a href="agents.php" class="btn btn-primary">Accéder</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Missions</h5>
                            <p class="card-text">Configurez les paramètres de missions des agents.</p>
                            <a href="missions.php" class="btn btn-primary">Accéder</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>



</body>




<?php include_once 'footer.php'; ?>







