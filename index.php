<?php

require_once 'config/database.php';
require_once 'controllers/TeamController.php';
require_once 'controllers/PlayerController.php';
require_once 'controllers/MatchController.php';


$action = $_GET['action'] ?? 'index';


$pdo = getPDO(); 

switch ($action) {
    case 'team':
        $controller = new TeamController($pdo);
        break;
    case 'player':
        $controller = new PlayerController($pdo);
        break;
    case 'match':
        $controller = new MatchController($pdo);
        break;
    default:
        $controller = new MatchController($pdo); // Default to MatchController
}

$controller->run($action);
