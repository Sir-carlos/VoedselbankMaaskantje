<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pakketen maken</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>
    <form action="producten.php" method="POST">
        <h1>Producten Toevoegen</h1>

        <br>

        <label for="naam">Naam:</label>
        <input type="text" name="naam"></label><br>

        <label for="categorie">Categorie</label>
        <select>
        <?php
                $query = $dbh->prepare(
                    "SELECT * FROM categorie;");
                    $result = $query->execute();
                    $all = $query->fetchAll();
            
                foreach($all as $key => $value){
                    echo('<option value="'. $value['naam'] .'">'. $value['naam'] .'</option>');
                };  echo("</select>");
            ?>

        <label for="aantal">Aantal:</label>
        <input type="text" name="aantal"></label><br>


        <input type="submit">
    </form>
        <script>
            function add(data){
                var tr = document.createElement('tr');
                
                var td = document.createElement('td');
                
                  
            }
        </script>
</body>
    <script src="script.js"></script>
</html>