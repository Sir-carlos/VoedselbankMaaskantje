<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; require_once 'database.php';?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Producten</title>
</head>
<body>
    <?php
    print_r($_REQUEST["q"]);
    $query = $dbh->prepare(
        "SELECT * FROM producten;");
        $result = $query->execute();
        $all = $query->fetchAll();

        print_r($all[$_REQUEST["q"]]);
    ?>
    
    <form action="producten.php" method="POST">
        <h1>Producten Bewerken</h1>

        <br>

        <label for="ean">EAN</label>
        <input type="text" name="ean" placeholder="5632795419357" required>

        
        <br>
        <br>

        <label for="naam">Naam</label>
        <input type="text" name="wachtwoord" placeholder="Banaan" required>

        
        <br>
        <br>

        <label for="categorie">Categorie</label>
        <input type="text" name="wachtwoord" placeholder="Fruit" required>
        
        <br>
        <br>

        <label for="aantal">Aantal</label>
        <input type="number" name="wachtwoord" placeholder="0" required>

        <br>
        <br>

        <input type="submit">
    </form>

</body>
</html>