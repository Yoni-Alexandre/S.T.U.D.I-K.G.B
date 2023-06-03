<?php

namespace controllers;

use models\Agent;
use models\Mission;
use models\Nationalite;
use models\Specialite;
use PDO;

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'listeAgents':
        $pageCourante = 1;
        $nbAgentsParPage = 5;
        $agents = Agent::findPage($pageCourante, $nbAgentsParPage);
        $nbPages = Agent::getNbPages($nbAgentsParPage);
//        $agents = Agent::findAll();
        $nbPages = 10;
        include('views/agents/agents.php');
        break;

    case 'liste':
        $pageCourante = $_GET['page'];
        $nbAgentsParPage = 5;
        $agents = Agent::findPage($pageCourante, $nbAgentsParPage);
        $nbPages = Agent::getNbPages($nbAgentsParPage);
//        $agents = Agent::findAll();
        $nbPages = 10;
        include('views/agents/agents.php');
        break;

    case 'page':
        $pageCourante = $_GET['page'];
        $agents = Agent::findPage($pageCourante, 5);
        include('views/agents/agents.php');
        break;

    case 'precedent':
        $pageCourante = $_GET['page'];
        $agents = Agent::findPage($pageCourante, -1);
        include('views/agents/agents.php');
        break;

    case 'suivant':
        $pageCourante = $_GET['page'];
        $agents = Agent::findPage($pageCourante, 1);
        include('views/agents/agents.php');
        break;

    case 'add':
        $nationalites = Nationalite::findAll();
        $specialites = Specialite::findAll();
        include('form/agents/formAgent.php');
        break;

    case 'valideForm':
        $agent = new Agent();
        $agentForm = Agent::add($agent);
        include 'views/agents/valideAjoutAgent.php';
        break;

    case 'update':
        $id = $_GET['id'];
        $req = \MonPdo::getInstance()->prepare("SELECT * FROM agents WHERE id = :id");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->bindParam(':id', $id);
        $req->execute();
        $agent = $req->fetch();
        $nationalites = Nationalite::findAll();
        $specialites = Specialite::findAll();
        include 'form/agents/formModifAgent.php';
        break;

    case 'valideModif':
        $agent = new Agent();
        $agentForm = Agent::update($agent);
        include 'views/agents/valideModifAgent.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        $agent = Agent::delete($id);
        include 'views/agents/agentSuppr.php';
        break;

    default:
        include 'views/404/404.php';
        break;
}
