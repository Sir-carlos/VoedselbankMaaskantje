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
        
        <p id="wensen"></p>

        <label for="familie">Familie:</label>
        <select>
        <option>Select</option>
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
        <select id="keuzen" onchange="press()">
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

        <input type="submit">
    </form>

<table id="content-table">
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
                var table = document.getElementById("content-table");

                var tr = document.createElement('tr');
                table.appendChild(tr);
                
                var n = document.createElement('td')
                tr.appendChild(n);
                var c = document.createElement('td')
                tr.appendChild(c);
                var ea = document.createElement('td')
                tr.appendChild(ea);

                var aan = document.createElement('td')
                tr.appendChild(aan);
                var aai = document.createElement("input")
                aai.setAttribute("type", "text")
                aan.appendChild(aai);

                var knoptd = document.createElement('td')
                tr.appendChild(knoptd);
                var knop = document.createElement('button')
                knoptd.appendChild(knop);   
                knop.onclick = function (knop) {
                    var prodnaam = knoptd.parentNode.cells[0].firstChild.data;
                    for(let i = 1; i < f.length; i++){
                    if(f[i].cells[0].firstChild.data === prodnaam){
                        table.deleteRow(i);
                        }
                    }
                }

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {   
                var info = JSON.parse(this.response);
                //console.log(info);
                var cat = document.createTextNode(info[6]);
                c.appendChild(cat);
                var ean = document.createTextNode(info[3]);
                ea.appendChild(ean);
            }
                xmlhttp.open("GET", "prods_ajax.php?q=" + x, true);
                xmlhttp.send();

                var f = document.getElementById("content-table").rows;
        }
        </script>  
    </tbody>
</table>
</body>
    <script src="script.js"></script>
</html>
