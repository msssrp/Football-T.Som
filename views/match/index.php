

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matches List</title>

</head>

<body>
    <h1>Matches List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Score Team 1</th>
                <th>Score Team 2</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matches as $match) : ?>
                <tr>
                    <td><?= $match['id']; ?></td>
                    <td><?= $match['team1_id']; ?></td>
                    <td><?= $match['team2_id']; ?></td>
                    <td><?= $match['score_team1']; ?></td>
                    <td><?= $match['score_team2']; ?></td>
                    <td><?= $match['date']; ?></td>
                    <td>
                        <a href="index.php?action=view&id=<?= $match['id']; ?>">View</a>
                        <a href="index.php?action=edit&id=<?= $match['id']; ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php?action=add">Add Match</a>
</body>

</html>
