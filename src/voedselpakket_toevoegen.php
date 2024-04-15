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
    <form action="voedselpakketen.php" method="POST">
        <h1>Voedselpakket Samenstelling</h1>

        <br>

        <label for="familie">Familie:</label>
        <select>
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

                var table = document.getElementsByClassName("content-table");

                console.log(table);

                var tr = document.createElement('tr');
                table[0].appendChild(tr);
                
                var n = document.createElement('td')
                tr.appendChild(n);

                var g = document.createTextNode(x);
                n.appendChild(g);
            }
        </script>  
    </tbody>
</table>
<p id="test"></p>
</body>
    <script src="script.js"></script>
</html>