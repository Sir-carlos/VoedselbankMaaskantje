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
            <input type="search" id="site-search" name="search" onkeyup="search(this.value)" placeholder="Zoeken . . ." />
        </div>
        <div class="box">
            <a class="button" href="producten_toevoegen"><img src="plusicon.svg" class="svg" width="30px">Toevoegen</a>
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

        $query = $dbh->prepare(
            "SELECT * FROM producten 
            INNER JOIN categorie ON producten.idcategorie = categorie.idcategorie;");
            $result = $query->execute();
            $all = $query->fetchAll();

        if(sizeof($_REQUEST) == 4){
            if($result = $dbh -> query("UPDATE producten SET naam = '". $_REQUEST['naam'] ."', aantal = '". $_REQUEST['aantal'] ."' WHERE idproduct = '". $_REQUEST['idcategorie'] ."';")){
                echo("Insertion Successfully");
            }else{
                echo("Insertion Failed");
            };
        }elseif(sizeof($_REQUEST) == 3){
            if($result = $dbh -> query("INSERT INTO producten(`idproduct`, `naam`, `idcategorie`, `ean`, `aantal`) VALUES('". end($all)['idproduct'] + 1 ."', '". $_REQUEST['naam'] ."', '2', '5465813679582', '21');")){
                echo("Insertion Successfully");
            }else{
                echo("Insertion Failed");
            };
        }

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
        ?>
    </tbody>
</table>
        <script>
            function search(value){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    //console.log(this.response);
                    
            }
                xmlhttp.open("GET", "search_ajax.php?q=" + value, true);
                xmlhttp.send();
            }
        </script>
</body>
    <script src="script.js"></script>
</html>