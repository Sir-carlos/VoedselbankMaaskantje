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
    <p>Lorem ipsum dolor sit amet</p>
    <div class="button-container">



<button class="main-button" role="button">Button</button>
<button class="main-button" role="button">Button</button>
</div>
    
    <div class="button-container">

    <?php
    if(isset($_SESSION['loggedin'])){
        echo("Logged in <br><br>");
        print_r($_SESSION);
    };
    ?>


<br>


</div>

</body>
    <script src="script.js"></script>
</html>