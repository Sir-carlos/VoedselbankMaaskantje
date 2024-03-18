<!DOCTYPE html>
<html lang="en">
<?php include 'header.php';
if(!empty($_SESSION)){
    if(!($_SESSION['functie'] == 'Directie')){
        if(!($_SESSION['functie'] == 'Medewerker')){
        header('location: index.php');
        }
    }
}?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src\style.css" rel="styleseheet">
    <title>Gezinnen Pagina</title>
    <?php require_once 'database.php';?>

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

    </style>
</head>
<body>
    <h1>Gezinnen</h1>

<table class="content-table">
    <thead>
        <tr>
            <th>Gezinnen Naam</th>
            <th>Adres</th>
            <th>Telefoonnummer</th>
            <th>Email</th>
            <th>Volwassen</th>
            <th>Kinderen</th>
            <th>Baby's</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = $dbh->prepare(
            "SELECT * FROM klanten;");
            $result = $query->execute();
            $all = $query->fetchAll();

            foreach($all as $key => $value){
                echo(
                    "<tr>
                    <td>" . $value["naam"] . "</td>
                    <td>" . $value["adres"] . "</td>
                    <td>" . $value["telefoonnummer"] . "</td>
                    <td>" . $value["email"] . "</td>
                    <td>" . $value["volwassen"] . "</td>
                    <td>" . $value["kinderen"] . "</td>
                    <td>" . $value["baby's"] . "</td>
                    </tr>"
                  );
            }
        ?>
    </tbody>
</table>
    
</body>
    <script src="script.js"></script>
</html>