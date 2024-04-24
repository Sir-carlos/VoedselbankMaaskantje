<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Producten</title>
    
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>
    <div class="form-wrapper">
    <?php
    $query = $dbh->prepare(
        "SELECT * FROM voedselpakket;");
        $result = $query->execute();
        $all = $query->fetchAll();

        $q = $_REQUEST["q"];
    
    echo('<form class="form-containersmall" action="producten.php?q=' . $q . '" method="POST"> 
        <h1>Producten Bewerken</h1>

        <br>

        <div class="form-group"> <!-- Voeg form-group class toe -->
            <label for="naam">Naam</label>
            <input type="text" name="naam" placeholder="Banaan" value="'. $all[$q]['naam'] .'">
        </div>

        <br>
        <br>

        <div class="form-group"> <!-- Voeg form-group class toe -->
            <label for="categorie">Categorie</label>
            <input type="text" name="idcategorie" placeholder="Fruit" value="'. $all[$q]['idcategorie'] .'">
        </div>
        
        <br>
        <br>

        <div class="form-group"> <!-- Voeg form-group class toe -->
            <label for="aantal">Aantal</label>
            <input type="number" name="aantal" placeholder="0" required value="'. $all[$q]['aantal'] .'">
        </div>

        <br>
        <br>

        <input type="submit">
    </form>');
    ?>
    </div>
</body>
</html>
