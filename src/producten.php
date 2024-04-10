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

        .control {
            align-items: center;
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            flex-direction: row;
            width: 80%;
            margin: auto;
        }

        .button {
            color: white;
            background-color: #00BF63;
            border: none;
            border-radius: 5px;
            padding: 8px 10px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .svg {
            padding-right: 10px;
        }

        input[type=search]{
            padding: 10px;
            border: 1px solid #D3D3D3;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <h1>Producten</h1>

    <div class="control">
        <div class="search">
            <input type="search" id="site-search" name="search" placeholder="Zoeken . . ." />
        </div>
        <div class="box">
            <button class="button"><img src="plusicon.svg" class="svg" width="30px">Toevoegen</button>
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
        ?>
    </tbody>
</table>

</body>
    <script src="script.js"></script>
</html>