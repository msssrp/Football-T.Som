<?php

class PlayerController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function run($action)
    {
        switch ($action) {
            case 'index':
                $this->index();
                break;
            case 'view':
                $this->view();
                break;
            case 'add':
                $this->add();
                break;
            case 'edit':
                $this->edit();
                break;
            default:
                $this->defaultAction();
        }
    }

    private function index()
    {
        $players = $this->getPlayersFromDatabase();
        include 'views/player/index.php';
    }

    private function view()
    {
        $playerId = $_GET['id'] ?? null;
        if ($playerId) {
            $player = $this->getPlayerFromDatabase($playerId);
            include 'views/player/view.php';
        } else {
            $this->defaultAction();
        }
    }

    private function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->savePlayerToDatabase($_POST);
            header('Location: index.php?action=index'); 
            exit();
        } else {
            include 'views/player/add.php';
        }
    }

    private function edit()
    {
        $playerId = $_GET['id'] ?? null;
        if ($playerId) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->updatePlayerInDatabase($playerId, $_POST);
                header("Location: index.php?action=view&id=$playerId"); 
                exit();
            } else {
                $player = $this->getPlayerFromDatabase($playerId);
                include 'views/player/edit.php';
            }
        } else {
            $this->defaultAction();
        }
    }

    private function defaultAction()
    {
        header('Location: index.php?action=index');
        exit();
    }

    private function getPlayersFromDatabase()
    {
        $stmt = $this->pdo->query('SELECT * FROM players');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getPlayerFromDatabase($playerId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM players WHERE id = :id');
        $stmt->execute(['id' => $playerId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function savePlayerToDatabase($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO players (name, position, team_id) VALUES (:name, :position, :team_id)');
        $stmt->execute([
            'name' => $data['name'],
            'position' => $data['position'],
            'team_id' => $data['team_id'],
        ]);
    }

    private function updatePlayerInDatabase($playerId, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE players SET name = :name, position = :position, team_id = :team_id WHERE id = :id');
        $stmt->execute([
            'id' => $playerId,
            'name' => $data['name'],
            'position' => $data['position'],
            'team_id' => $data['team_id'],
        ]);
    }
}
