<?php

namespace controllers;

use models\Administrateur;
use mysqli;

$action = $_GET['action'];

switch ($action) {

    case 'adminConsole':
        include('views/administration/administration.php');
        break;

    case 'login':
        include('form/administrations/formLogin.php');
        break;

    case 'logout':
        include('views/administration/valideLogout.php');
        break;

    case 'test':
        session_destroy();
        include('views/administration/logout.php');
        break;

        case 'connexion':
            Administrateur::login($_POST['username'], $_POST['password']);

            break;
}