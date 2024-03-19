<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Producten</title>
    <?php require_once 'database.php';?>
    <style>
        .bimg{
            width: 20px;
        }
    </style>
</head>
<body>
    <h1>Producten</h1>

    <button>Toevoegen</button>
    
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
                    <td>" . $value["idcategorie"] . "</td>
                    <td>" . $value["ean"] . "</td>
                    <td>" . $value["aantal"] . '</td>
                    <td> <a href="producten_bewerken.php"><img src="bewerken.png" class="bimg"></a> </td>
                    </tr>'
                  );
            }
        ?>
    </table>

</body>
    <script src="script.js"></script>
</html>