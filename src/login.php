<!DOCTYPE html>
<html lang="en">
<?php include 'header.html' ?>
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

        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" required>

        <br>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required>

        <br>
        <br>

        <input type="submit">
    </form>
    
    
</body>
    <script src="script.js"></script>
</html>