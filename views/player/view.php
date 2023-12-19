
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Player</title>

</head>

<body>
    <h1>Player Details</h1>

    <p>ID: <?= $player['id']; ?></p>
    <p>Name: <?= $player['name']; ?></p>
    <p>Position: <?= $player['position']; ?></p>
    <p>Team ID: <?= $player['team_id']; ?></p>
    
    <a href="index.php?action=index">Back to Players List</a>
</body>

</html>
