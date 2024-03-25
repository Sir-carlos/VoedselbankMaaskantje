<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="wachtwoord_check.php" method="POST">
        <h1>Verander wachtwoord</h1>

        <br>

        <label for="username">Huidige Wachtwoord</label>
        <input type="password" name="hwachtwoord" placeholder="Wachtwoord" required>

        <br>
        <br>

        <label for="password">Nieuwe Wachtwoord</label>
        <input type="password" name="nwachtwoord" placeholder="Wachtwoord" required>

        <br>
        <br>

        <input type="submit">
    </form>
</body>
</html>