<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Voedselpakketen</title>    
    <style>
        
        .bimg{
            width: 20px;
        }

    </style>
</head>
<body>
    <h1>Voedselpakketen</h1>

    <a href="voedselpakket_toevoegen.php">Toevoegen</a>
    
<table class="content-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Gezin</th>
            <th>Aanmaak datum</th>
            <th>Uitgifte datum</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = $dbh->prepare(
            "SELECT * FROM voedselpakket 
            INNER JOIN klanten ON voedselpakket.klanten_idklanten = klanten.idklanten;");
            $result = $query->execute();
            $all = $query->fetchAll();

            foreach($all as $key => $value){
                echo(
                    "<tr>
                    <td>" . $value["idpakket"] . "</td>
                    <td>" . $value["naam"] . "</td>
                    <td>" . $value["aanmaak"] . "</td>
                    <td>" . $value["uitgifte"] . '</td>
                    <td> <a href=".php?q='. $key .'"><img src="bewerken.png" class="bimg" onclick="sendkey($key)"></a> </td>
                    </tr>'
                  );
            };

            if(!empty($_REQUEST)){
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