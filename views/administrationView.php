<?php
include_once '../config/database.php';
include_once '../models/Administration.php';
include_once 'layout/header.php';
?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-4 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="agents/agentsView.php">
                            <span data-feather="home"></span>
                            <i class="fa fa-user-secret" aria-hidden="true"></i> Agents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nationalitesView.php">
                            <span data-feather="settings"></span>
                            <i class="fa fa-flag" aria-hidden="true"></i> Nationalités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="specialitesView.php">
                            <span data-feather="settings"></span>
                            <i class="fa fa-binoculars" aria-hidden="true"></i> Spécialités
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="missions/missionsView.php">
                            <span data-feather="users"></span>
                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                            Missions
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
                            <a href="agents/agentsView.php" class="btn btn-primary">Accéder</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nationalités</h5>
                            <p class="card-text">Gérez les nationalités des agents.</p>
                            <a href="nationalitesView.php" class="btn btn-primary">Accéder</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Spécialités</h5>
                            <p class="card-text">Gérez les spécialités.</p>
                            <a href="specialitesView.php" class="btn btn-primary">Accéder</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Missions</h5>
                            <p class="card-text">Configurez les paramètres de missions des agents.</p>
                            <a href="missions/missionsView.php" class="btn btn-primary">Accéder</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include_once 'layout/footer.php'; ?>







