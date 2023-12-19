

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Match</title>

</head>

<body>
    <h1>Add Match</h1>

    <form action="index.php?action=add" method="post">

        <label for="team1_id">Team 1 ID:</label>
        <input type="text" id="team1_id" name="team1_id" required>

        <label for="team2_id">Team 2 ID:</label>
        <input type="text" id="team2_id" name="team2_id" required>

        <label for="score_team1">Score Team 1:</label>
        <input type="text" id="score_team1" name="score_team1" required>

        <label for="score_team2">Score Team 2:</label>
        <input type="text" id="score_team2" name="score_team2" required>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <button type="submit">Add Match</button>
    </form>

    <a href="index.php?action=index">Back to Matches List</a>
</body>

</html>
