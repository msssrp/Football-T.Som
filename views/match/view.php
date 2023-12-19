

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Match</title>

</head>

<body>
    <h1>Match Details</h1>

    <p>ID: <?= $match['id']; ?></p>
    <p>Team 1: <?= $match['team1_id']; ?></p>
    <p>Team 2: <?= $match['team2_id']; ?></p>
    <p>Score Team 1: <?= $match['score_team1']; ?></p>
    <p>Score Team 2: <?= $match['score_team2']; ?></p>
    <p>Date: <?= $match['date']; ?></p>

    <a href="index.php?action=index">Back to Matches List</a>
</body>

</html>
