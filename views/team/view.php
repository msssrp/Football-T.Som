

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Team</title>

</head>

<body>
    <h1>Team Details</h1>

    <p>ID: <?= $team['id']; ?></p>
    <p>Name: <?= $team['name']; ?></p>
    <p>City: <?= $team['city']; ?></p>
    <p>Country: <?= $team['country']; ?></p>

    <a href="index.php?action=index">Back to Teams List</a>
</body>

</html>
