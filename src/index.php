<?php session_start(); include 'header.php'; ?>
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
    <p>bla bla bla bla bla</p>
    <div class="button-container">



<button class="button-85" role="button">Button 85</button>

</div>
    
    <div class="button-container">

    <?php
    if(isset($_SESSION['loggedin'])){
        echo("Logged in");
    }
    ?>


<br>
<button class="button-85" role="button">Button 85</button>

</div>
    
</body>
    <script src="script.js"></script>
</html>