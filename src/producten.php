<!DOCTYPE html>
<html lang="en">
<?php include 'header.html' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Producten</title>
    <?php require_once 'database.php';?>
</head>
<body>
    <h1>Producten</h1>
    
    <table>
        <tr>
            <th>Product Naam</th>
            <th>Categorie</th>
            <th>EAN</th>
            <th>Aantal</th>
            <th>Acties</th>
        </tr>
        <?php
        $query = $dbh->prepare(
            "SELECT * FROM producten;");
            $result = $query->execute();
            $all = $query->fetchAll();

            foreach($all as $key => $value){
                echo(
                    "<tr>
                    <td>" . $value["naam"] . "</td>
                    <td>" . $value["categorie"] . "</td>
                    <td>" . $value["EAN"] . "</td>
                    <td>" . $value["aantal"] . "</td>
                    </tr>"
                  );
            }
        ?>
    </table>

</body>
    <script src="script.js"></script>
</html>