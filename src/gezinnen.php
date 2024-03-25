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
    <link rel="stylesheet" href="style.css">
    <title>Gezinnen Pagina</title>
    <?php require_once 'database.php';?>
</head>
<body>
    <h1>Gezinnen</h1>

    <table class="gdata">
        <tr>
            <th>Gezinnen Naam</th>
            <th>Adres</th>
            <th>Telefoonnummer</th>
            <th>Email</th>
            <th>Volwassen</th>
            <th>Kinderen</th>
            <th>Baby's</th>
        </tr>
        <tr>
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
        </tr>
    </table>
    
</body>
    <script src="script.js"></script>
</html>