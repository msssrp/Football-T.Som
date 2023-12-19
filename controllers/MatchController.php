<?php

class MatchController
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
        $matches = $this->getMatchesFromDatabase();
        include 'views/match/index.php';
    }

    private function view()
    {
        $matchId = $_GET['id'] ?? null;
        if ($matchId) {
            $match = $this->getMatchFromDatabase($matchId);
            include 'views/match/view.php';
        } else {
            $this->defaultAction();
        }
    }

    private function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->saveMatchToDatabase($_POST);
            header('Location: index.php?action=index');
            exit();
        } else {
            include 'views/match/add.php';
        }
    }

    private function edit()
    {
        $matchId = $_GET['id'] ?? null;
        if ($matchId) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->updateMatchInDatabase($matchId, $_POST);
                header("Location: index.php?action=view&id=$matchId");
                exit();
            } else {
                $match = $this->getMatchFromDatabase($matchId);
                include 'views/match/edit.php';
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

    private function getMatchesFromDatabase()
    {
        $stmt = $this->pdo->query('SELECT * FROM matches');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getMatchFromDatabase($matchId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM matches WHERE id = :id');
        $stmt->execute(['id' => $matchId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function saveMatchToDatabase($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO matches (team1_id, team2_id, score_team1, score_team2, date) VALUES (:team1_id, :team2_id, :score_team1, :score_team2, :date)');
        $stmt->execute([
            'team1_id' => $data['team1_id'],
            'team2_id' => $data['team2_id'],
            'score_team1' => $data['score_team1'],
            'score_team2' => $data['score_team2'],
            'date' => $data['date'],
        ]);
    }

    private function updateMatchInDatabase($matchId, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE matches SET team1_id = :team1_id, team2_id = :team2_id, score_team1 = :score_team1, score_team2 = :score_team2, date = :date WHERE id = :id');
        $stmt->execute([
            'id' => $matchId,
            'team1_id' => $data['team1_id'],
            'team2_id' => $data['team2_id'],
            'score_team1' => $data['score_team1'],
            'score_team2' => $data['score_team2'],
            'date' => $data['date'],
        ]);
    }
}
