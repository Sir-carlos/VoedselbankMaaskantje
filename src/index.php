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
    <div class="img">
    <img src="Voedselbankje.jpg" alt="Voedselbank Maaskantje">
    </div>
    <p>Lorem ipsum dolor sit amet</p>
    <div class="button-container">




</div>
    
    <div class="button-container">

    <?php
    if(isset($_SESSION['loggedin'])){
        echo("Welkom ");
        print_r($_SESSION['name']);
        echo("!");
    };
    ?>


<br>


</div>

</body>
    <script src="script.js"></script>
</html>