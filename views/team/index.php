

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams List</title>
  
</head>

<body>
    <h1>Teams List</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $team) : ?>
                <tr>
                    <td><?= $team['id']; ?></td>
                    <td><?= $team['name']; ?></td>
                    <td><?= $team['city']; ?></td>
                    <td><?= $team['country']; ?></td>
                    <td>
                        <a href="index.php?action=view&id=<?= $team['id']; ?>">View</a>
                        <a href="index.php?action=edit&id=<?= $team['id']; ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php?action=add">Add Team</a>
</body>

</html>
