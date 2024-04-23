<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Pagina</title>
</head>
<body>

    <h1>Home</h1>
    <div class="home-container">
    <?php
    if(isset($_SESSION['loggedin'])){
        echo("Welkom ");
        print_r($_SESSION['name']);
        echo("!");
    };
    ?>
    <img src="Voedselbankje.webp" alt="Voedselbank Maaskantje">
    </div>

    <p>Lorem ipsum dolor sit amet</p>

</body>
    <script src="script.js"></script>
</html>