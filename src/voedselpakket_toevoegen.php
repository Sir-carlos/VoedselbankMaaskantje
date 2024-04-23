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
    <!--<form action="voedselpakketen.php" method="POST">-->
        <h1>Voedselpakket Samenstelling</h1>

        <br>
        
        <p id="wensen"></p>

        <label for="familie">Familie:</label>
        <select id="keuzen_f" onchange="wensen()">
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

        <label for="prod">Selecteer Producten</label>
        <select id="keuzen_p" onchange="press()">
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

        <button id='send' onclick="submit()">Submit</button>
    </form>


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
                    var x = document.getElementById("keuzen_p").value;
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

                var g = document.createTextNode(x);
                n.appendChild(g);

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {   
                var info = JSON.parse(this.response);

                var cat = document.createTextNode(info[6]);
                c.appendChild(cat);
                var ean = document.createTextNode(info[3]);
                ea.appendChild(ean);
            }
                xmlhttp.open("GET", "prods_ajax.php?q=" + x, true);
                xmlhttp.send();

                var f = document.getElementById("content-table").rows;
        }
        function wensen(){
            var x = document.getElementById("keuzen_f").value;

            var xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                var info = JSON.parse(this.response);
            }
                xmlhttp.open("GET", "wensen_ajax.php?q=" + x, true);
                xmlhttp.send();
        }
        function submit(){
            var table = document.getElementById("content-table").rows;
            //var test = document.getElementById("content-table").rows[1].cells[3].firstChild.value;
            
            var arr = [];
            for(let i = 1; i < table.length; i++){
                arr.push({ naam: document.getElementById("keuzen_f").value, product: document.getElementById("content-table").rows[i].cells[0].firstChild.data, aantal: document.getElementById("content-table").rows[i].cells[3].firstChild.value});
                //arr.push(document.getElementById("content-table").rows[i].cells[3].firstChild.value);
            }
            //console.log(document.getElementById("content-table").rows[1].cells[0].firstChild.data);

            var xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                }
<<<<<<< HEAD
                xmlhttp.open("GET", "send_ajax.php?q=" + JSON.stringify(arr), true);
                xmlhttp.send();
                
                window.location.replace("http://localhost/examproj/VoedselbankMaaskantje/src/voedselpakketen.php");
        }
        </script>  
    </tbody>
</table>
=======
            </script>  
        </tbody>
    </table>
    </div>
>>>>>>> Karsten
</body>
    <script src="script.js"></script>
</html>