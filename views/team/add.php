

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Team</title>

</head>

<body>
    <h1>Add Team</h1>

    <form action="index.php?action=add" method="post">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>

        <button type="submit">Add Team</button>
    </form>

    <a href="index.php?action=index">Back to Teams List</a>
</body>

</html>
