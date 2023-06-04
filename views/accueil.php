<body >
<main>
    <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 85vh;">
        <div class="text-center">
            <img src="../assets/images/Emblema_del_KGB.png" class="img-fluid" alt="Logo" style="max-width: 200px; height: auto;">
            <h1 class="mt-4">s.t.u.d.i | k.g.b</h1>
            <h2 class="mt-4"><a href="../index.php?uc=mission&action=listeMissions" class="btn btn-primary">Consultez la liste des Missions (publique)</a></h2>
            <?php if (isset($_SESSION['user'])) { ?>
                <h2><a href="../index.php?uc=mission&action=listeMissions" class="btn btn-primary">Administration (privée)</a></h2>
            <?php } ?>
        </div>
    </div>

</main>