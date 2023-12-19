

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player</title>

</head>

<body>
    <h1>Edit Player</h1>

    <form action="index.php?action=edit&id=<?= $player['id']; ?>" method="post">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $player['name']; ?>" required>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" value="<?= $player['position']; ?>" required>

        <label for="team_id">Team ID:</label>
        <input type="text" id="team_id" name="team_id" value="<?= $player['team_id']; ?>" required>

        <button type="submit">Update Player</button>
    </form>

    <a href="index.php?action=index">Back to Players List</a>
</body>

</html>
