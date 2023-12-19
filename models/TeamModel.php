<?php

class TeamModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTeams()
    {
        $stmt = $this->pdo->query('SELECT * FROM teams');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTeamById($teamId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM teams WHERE id = :id');
        $stmt->execute(['id' => $teamId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addTeam($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO teams (name, city, country) VALUES (:name, :city, :country)');
        $stmt->execute([
            'name' => $data['name'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);
    }

    public function updateTeam($teamId, $data)
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
