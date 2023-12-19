<?php

class PlayerModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllPlayers()
    {
        $stmt = $this->pdo->query('SELECT * FROM players');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlayerById($playerId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM players WHERE id = :id');
        $stmt->execute(['id' => $playerId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPlayer($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO players (name, position, team_id) VALUES (:name, :position, :team_id)');
        $stmt->execute([
            'name' => $data['name'],
            'position' => $data['position'],
            'team_id' => $data['team_id'],
        ]);
    }

    public function updatePlayer($playerId, $data)
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
