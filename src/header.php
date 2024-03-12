<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav">
        <a href="index.php"><span>Home</span></a>
        <a href="producten.php"><span>Producten</span></a>
        <a href="gezinnen.php"><span>Gezinnen</span></a>
        <a href="leveranciers.php"><span>Leveranciers</span></a>
        <a href="voedselpakketen.php"><span>Voedselpakketen</span></a>
        <a href="gebruikers.php"><span>Gebruikers</span></a>
        <?php        
        if(isset($_SESSION['loggedin'])){
            echo('<a href="profiel.php" style="float: right;"><img src="loggedin.png"  class="logged"></a>');
        }else{
            echo('<a href="login.php" style="float: right;">Login</a>');
        }
        ?>
    </div>
</body>
    <script src="script.js"></script>
</html>