<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Producten</title>    
    <style>
        .content-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 1px grey;
            margin-left: auto;
            margin-right: auto;
            margin-top: 100px;
            width: 80%;
        }

        .content-table thead {
            background-color: #00BF63;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }
        
        .content-table th,
        .content-table td {
            padding: 12px 15px; 
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        body {
            font-family: "Noto Sans", sans-serif;
        }
        
        .bimg{
            width: 20px;
        }
    </style>
</head>
<body>
    <h1>Producten</h1>

    <button>Toevoegen</button>
    
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