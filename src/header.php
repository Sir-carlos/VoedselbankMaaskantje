<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="nav">
        <a href="index.php"><span>Home</span></a>
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
            echo('<a href="profiel.php" style="float: right;"><span>Profiel</span></a>');
        }else{
            echo('<a href="login.php" style="float: right;"><span>Login</span></a>');
        }
        ?>
        

    </div>

</body>
    <script src="script.js"></script>
</html>