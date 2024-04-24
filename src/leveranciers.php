<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>leveranciers</title>    
    <style>
        
        .bimg{
            width: 20px;
        }

    </style>
</head>
<body>
    <h1>Leveranciers</h1>

    <div class="control">
        <div class="search">
            <input type="search" id="site-search" name="search" placeholder="Zoeken . . ." />
        </div>
        <div class="box">
            <a href="leveranciers_toevoegen.php">
            <button class="button"><img src="plusicon.svg" class="svg" width="30px">Toevoegen</button>
            </a>
        </div>
    </div>
    
<table class="content-table">
    <thead>
        <tr>
            <th>Bedrijf</th>
            <th>Contactpersoon</th>
            <th>Email</th>
            <th>Postcode</th>
            <th>Telefoon</th>
            <th>Volgende levering</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = $dbh->prepare(
            "SELECT * FROM leveranciers;");
            $result = $query->execute();
            $all = $query->fetchAll();

            //print_r($_REQUEST);

            foreach($all as $key => $value){
                echo(
                    "<tr>
                    <td>" . $value["bedrijf"] . "</td>
                    <td>" . $value["contactpersoon"] . "</td>
                    <td>" . $value["email"] . "</td>
                    <td>" . $value["postcode"] . "</td>
                    <td>" . $value["telefoonnummer"] . "</td>
                    <td>" . $value["volgende levering"] . '</td>
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



