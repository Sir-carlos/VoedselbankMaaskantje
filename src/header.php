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
        <a href="form.php"><span>Formulier</span></a>
        <?php
        if(!empty($_SESSION)){
        if($_SESSION['functie'] == 'Directie'){
            echo('<a href="gezinnen.php"><span>Gezinnen</span></a> <!-- vrijwilliger -->
            <a href="voedselpakketen.php"><span>Voedselpakketen</span></a> <!-- vrijwilliger -->
            <a href="producten.php"><span>Producten</span></a> <!-- vrijwilliger medewerker -->
            <a href="leveranciers.php"><span>Leveranciers</span></a> <!-- directie mederwerker -->
            <a href="gebruikers.php"><span>Gebruikers</span></a> <!-- directie -->');
        }elseif($_SESSION['functie'] == 'Medewerker'){
            echo('<a href="producten.php"><span>Producten</span></a> <!-- vrijwilliger medewerker -->
            <a href="leveranciers.php"><span>Leveranciers</span></a> <!-- directie mederwerker -->');
        }elseif($_SESSION['functie'] == 'vrijwilliger'){
            echo('<a href="gezinnen.php"><span>Gezinnen</span></a> <!-- vrijwilliger -->
            <a href="voedselpakketen.php"><span>Voedselpakketen</span></a> <!-- vrijwilliger -->
            <a href="producten.php"><span>Producten</span></a> <!-- vrijwilliger medewerker -->
            <a href="leveranciers.php"><span>Leveranciers</span></a> <!-- directie mederwerker -->');            
        }
    };
        if(isset($_SESSION['loggedin'])){
            echo('<a href="logout.php" style="float: right;"><span>Logout</span></a>');
        }else{
            echo('<a href="login.php" style="float: right;"><span>Login</span></a>');
        }
        ?>
    </div>
</body>
    <script src="script.js"></script>
</html>