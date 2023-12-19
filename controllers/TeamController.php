<?php

class TeamController
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
        $teams = $this->getTeamsFromDatabase();
        include 'views/team/index.php';
    }

    private function view()
    {
        $teamId = $_GET['id'] ?? null;
        if ($teamId) {
            $team = $this->getTeamFromDatabase($teamId);
            include 'views/team/view.php';
        } else {
            // Handle invalid team ID
            $this->defaultAction();
        }
    }

    private function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->saveTeamToDatabase($_POST);
            header('Location: index.php?action=index');
            exit();
        } else {
            include 'views/team/add.php';
        }
    }

    private function edit()
    {
        $teamId = $_GET['id'] ?? null;
        if ($teamId) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->updateTeamInDatabase($teamId, $_POST);
                header("Location: index.php?action=view&id=$teamId");
                exit();
            } else {
                $team = $this->getTeamFromDatabase($teamId);
                include 'views/team/edit.php';
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

    private function getTeamsFromDatabase()
    {
        $stmt = $this->pdo->query('SELECT * FROM teams');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getTeamFromDatabase($teamId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM teams WHERE id = :id');
        $stmt->execute(['id' => $teamId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function saveTeamToDatabase($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO teams (name, city, country) VALUES (:name, :city, :country)');
        $stmt->execute([
            'name' => $data['name'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);
    }

    private function updateTeamInDatabase($teamId, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE teams SET name = :name, city = :city, country = :country WHERE id = :id');
        $stmt->execute([
            'id' => $teamId,
            'name' => $data['name'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);
    }
}
