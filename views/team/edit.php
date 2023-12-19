

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team</title>

</head>

<body>
    <h1>Edit Team</h1>

    <form action="index.php?action=edit&id=<?= $team['id']; ?>" method="post">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $team['name']; ?>" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?= $team['city']; ?>" required>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?= $team['country']; ?>" required>

        <button type="submit">Update Team</button>
    </form>

    <a href="index.php?action=index">Back to Teams List</a>
</body>

</html>
