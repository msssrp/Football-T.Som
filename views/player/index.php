

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players List</title>

</head>

<body>
    <h1>Players List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Team ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($players as $player) : ?>
                <tr>
                    <td><?= $player['id']; ?></td>
                    <td><?= $player['name']; ?></td>
                    <td><?= $player['position']; ?></td>
                    <td><?= $player['team_id']; ?></td>
                    <td>
                        <a href="index.php?action=view&id=<?= $player['id']; ?>">View</a>
                        <a href="index.php?action=edit&id=<?= $player['id']; ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php?action=add">Add Player</a>
</body>

</html>
