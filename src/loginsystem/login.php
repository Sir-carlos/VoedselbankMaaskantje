<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Pagina</title>
</head>
<body>
    <form action="login_check.php" method="POST">
        <h1>Login</h1>

        <br>

        <label for="username">Gebruikersnaam</label>
        <input type="text" name="gebruikersnaam" placeholder="Gebruikernaam" required>

        <br>
        <br>

        <label for="password">Wachtwoord</label>
        <input type="password" name="wachtwoord" placeholder="Wachtwoord" required>

        <br>
        <br>

        <input type="submit">
    </form>
    
    
</body>
    <script src="script.js"></script>
</html>