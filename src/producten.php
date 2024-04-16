<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Producten</title>    
    <style>
        
        .bimg{
            width: 20px;
        }

    </style>
</head>
<body>
    <h1>Producten</h1>

    <div class="control">
        <div class="search">
        <form action="" method="GET">
            <input type="search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Zoeken . . ." />
            <button type="submit" class="zoekbutton">Zoek</button>
        </form>
        </div>
        <div class="box">
            <a href="producten_bewerken.php">
            <button class="toevoegbutton"><img src="plusicon.svg" class="svg" width="30px">Toevoegen</button>
            </a>
        </div>
    </div>
    
    
<table class="content-table">
    <thead>
        <tr>
            <th>Product Naam</th>
            <th>Categorie</th>
            <th>EAN</th>
            <th>Aantal</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(!empty($_REQUEST)){
            if($result = $dbh -> query("UPDATE producten SET naam = '". $_REQUEST['naam'] ."', aantal = '". $_REQUEST['aantal'] ."' WHERE idproduct = '". $_REQUEST['idcategorie'] ."';")){
                echo("Insertion Successfully"); 
            }else{
                echo("Insertion Failed");
            };
        }

        $query = $dbh->prepare(
            "SELECT * FROM producten 
            INNER JOIN categorie ON producten.idcategorie = categorie.idcategorie;");
            $result = $query->execute();
            $all = $query->fetchAll();

            foreach($all as $key => $value){
                echo(
                    "<tr>
                    <td>" . $value["1"] . "</td>
                    <td>" . $value["6"] . "</td>
                    <td>" . $value["ean"] . "</td>
                    <td>" . $value["aantal"] . '</td>
                    <td> <a href="producten_bewerken.php?q='. $key .'"><img src="bewerken.png" class="bimg" onclick="sendkey($key)"></a> </td>
                    </tr>'
                  );
            };

            if(isset($_GET['search'])) {

                $filtervalues = $_GET['search'];
                $query = "SELECT * FROM producten WHERE CONCAT(naam, ean) LIKE '%$filtervalues%' ";
                $query_run = mysqli_query($dbh, $query);

                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $items){
                       ?>
                       <tr>
                            <td><?= $items['naam']; ?></td>
                            <td><?= $items['ean']; ?></td>
                        </tr>
                       <?php
                    }

                } else {

                    ?>
                    <tr>
                        <td colspan="5">Geen zoekresultaten gevonden.</td>
                    </tr>

                    <?php

                }
            }
        ?>
    </tbody>
</table>

</body>
    <script src="script.js"></script>
</html>