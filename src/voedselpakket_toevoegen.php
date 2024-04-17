<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pakketen maken</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>
    <div class="form-wrapper">
        <form class="form-containersmall" action="voedselpakketen.php" method="POST">
            <h1>Voedselpakket Samenstelling</h1>

            <br>

            <label for="familie">Familie:</label>
            <select id="familie" class="form-select">
            <?php
                    $query = $dbh->prepare(
                        "SELECT * FROM klanten;");
                        $result = $query->execute();
                        $all = $query->fetchAll();
                
                    foreach($all as $key => $value){
                        echo('<option value="'. $value['naam'] .'">'. $value['naam'] .'</option>');
                    };  echo("</select>");
                ?>

            
            <br>
            <br>

            <label for="familie">Selecteer Producten</label>
            <select id="keuzen" onchange="press()" class="form-select">
            <option>Select</option>
            <?php
                    $query = $dbh->prepare(
                        "SELECT * FROM producten;");
                        $result = $query->execute();
                        $all = $query->fetchAll();
                
                    foreach($all as $key => $value){
                        echo('<option value="'. $value['naam'] .'">'. $value['naam'] .'</option>');
                    };  echo("</select>");
                ?>
            
            <br>
            <br>

            <input type="submit" class="buttonz">
        </form>
    </div>


<div class="form-wrapperr">
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
            <script>
                function press(){
                    var x = document.getElementById("keuzen").value;
                    if(x === "Select"){return};

                    var table = document.querySelector(".content-table tbody");

                    var tr = document.createElement('tr');
                    table.appendChild(tr);
                    
                    var n = document.createElement('td')
                    tr.appendChild(n);
                    var c = document.createElement('td')
                    tr.appendChild(c);
                    var ea = document.createElement('td')
                    tr.appendChild(ea);
                    var aa = document.createElement("input")
                    aa.setAttribute("type", "text")
                    tr.appendChild(aa);
                    var ac = document.createElement('td')
                    tr.appendChild(ac);

                    var g = document.createTextNode(x);
                    n.appendChild(g);

                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onload = function() {   
                    var info = JSON.parse(this.response);
                    console.log(info);
                    var cat = document.createTextNode(info[6]);
                    c.appendChild(cat);
                    var ean = document.createTextNode(info[3]);
                    ea.appendChild(ean);
                }
                    xmlhttp.open("GET", "prods_ajax.php?q=" + x, true);
                    xmlhttp.send();
                }
            </script>  
        </tbody>
    </table>
    </div>
</body>
    <script src="script.js"></script>
</html>
