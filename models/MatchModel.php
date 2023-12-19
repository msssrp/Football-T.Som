<?php

class MatchModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllMatches()
    {
        $stmt = $this->pdo->query('SELECT * FROM matches');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMatchById($matchId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM matches WHERE id = :id');
        $stmt->execute(['id' => $matchId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addMatch($data)
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

    public function updateMatch($matchId, $data)
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
