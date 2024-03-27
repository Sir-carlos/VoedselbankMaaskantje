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
    $query = $dbh->prepare(
        "SELECT * FROM producten;");
        $result = $query->execute();
        $all = $query->fetchAll();

        $q = $_REQUEST["q"];
    
    echo('<form action="producten_bewerken_response.php?q=' . $q . '" method="POST">
        <h1>Producten Bewerken</h1>

        <br>

        <label for="ean">EAN</label>
        <input type="text" name="ean" placeholder="5632795419357" value="'. $all[$q]['ean'] .'">

        
        <br>
        <br>

        <label for="naam">Naam</label>
        <input type="text" name="naam" placeholder="Banaan" value="'. $all[$q]['naam'] .'">

        
        <br>
        <br>

        <label for="categorie">Categorie</label>
        <input type="text" name="idcategorie" placeholder="Fruit" value="'. $all[$q]['idcategorie'] .'">
        
        <br>
        <br>

        <label for="aantal">Aantal</label>
        <input type="number" name="aantal" placeholder="0" required value="'. $all[$q]['aantal'] .'">

        <br>
        <br>

        <input type="submit">
    </form>');
    ?>
</body>
</html>