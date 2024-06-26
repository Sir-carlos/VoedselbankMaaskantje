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

    <div class="control">
        <div class="search">
            <input type="search" id="site-search" name="search" placeholder="Zoeken . . ." onkeyup="search(this.value)" />
        </div>
        <div class="box">
            <a class="button" href="voedselpakket_toevoegen.php"><img src="plusicon.svg" class="svg" width="30px">Toevoegen</a>
        </div>
    </div>
    
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
    <tbody id="table-body">
        <?php
        $query = $dbh->prepare(
            "SELECT * FROM voedselpakket 
            INNER JOIN klanten ON voedselpakket.klanten_idklanten = klanten.idklanten ORDER BY idpakket DESC;");
            $result = $query->execute();
            $all = $query->fetchAll();

            foreach($all as $key => $value){
                echo(
                    "<tr>
                    <td>" . $value["idpakket"] . "</td>
                    <td>" . $value["naam"] . "</td>
                    <td>" . $value["aanmaak"] . "</td>
                    <td>" . $value["uitgifte"] . '</td>
                    <td> <a href=".php?q='. $key .'"><img src="bewerken.png" class="bimg" onclick="sendkey($key)"></a>');

                    if(!$value['uitgifte']){
                        echo('
                        <a href=".php?q='. $key .'" onclick="event.preventDefault();"><img src="picked_up.png" class="bimg" onclick="ndate('. $value['idpakket'] .')"></a>
                        </td>
                         </tr>'
                        );
                    };
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

<script>
    function search(value) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table-body").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "vsearch_ajax.php?q=" + value, true);
        xmlhttp.send();
    }
    function ndate(value){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            if(this.response == "success"){
                location.reload();
            }
        };
        xmlhttp.open("GET", "date_ajax.php?q=" + value, true);
        xmlhttp.send();
    }
</script>

</body>
    <script src="script.js"></script>
</html>