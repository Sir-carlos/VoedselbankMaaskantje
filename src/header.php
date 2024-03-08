<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="producten.php">Producten</a>
        <a href="gezinnen.php">Gezinnen</a>
        <a href="leveranciers.php">Leveranciers</a>
        <a href="voedselpakketen.php">Voedselpakketen</a>
        <a href="gebruikers.php">Gebruikers</a>
        <?php        
        if($_SESSION['loggedin'] == 1){
            echo('e');
        }else{
            echo('<a href="login.php" style="float: right;">Login</a>');
        }
        ?>
    </div>
</body>
    <script src="script.js"></script>
</html>