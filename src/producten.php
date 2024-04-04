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
        }

        .button {
            color: white;
            background-color: #00BF63;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <h1>Producten</h1>

    <div class="control">
        <button class="button"><img src="plus.svg">Toevoegen</button>
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
            "SELECT * FROM producten;");
            $result = $query->execute();
            $all = $query->fetchAll();

            //print_r($_REQUEST);

            foreach($all as $key => $value){
                echo(
                    "<tr>
                    <td>" . $value["naam"] . "</td>
                    <td>" . $value["idcategorie"] . "</td>
                    <td>" . $value["ean"] . "</td>
                    <td>" . $value["aantal"] . '</td>
                    <td> <a href="producten_bewerken.php?q='. $key .'"><img src="bewerken.png" class="bimg" onclick="sendkey($key)"></a> </td>
                    </tr>'
                  );
            };

            if(!empty($_REQUEST)){
            //$sql = "UPDATE producten SET naam = '". $_REQUEST['naam'] ."', ean = '". $_REQUEST['ean'] ."', aantal = '". $_REQUEST['aantal'] ."' WHERE idproduct = '". $_REQUEST['q'] ."';";

            if($result = $dbh -> query("UPDATE producten SET naam = '". $_REQUEST['naam'] ."', ean = '". $_REQUEST['ean'] ."', aantal = '". $_REQUEST['aantal'] ."' WHERE idproduct = '". $_REQUEST['idcategorie'] ."';")){
                echo("Insertion Successfully");
            }else{
                echo("Insertion Failed");
            };
            }

        ?>
    </tbody>
</table>

</body>
    <script src="script.js"></script>
</html>