<!DOCTYPE html>
<html lang="en">
<?php include 'header.html' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src\style.css" rel="styleseheet">
    <title>Gezinnen Pagina</title>
    <?php
    $user = "schooluser";
    $pass = "Schooluser18!";

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=voedselbank', $user, $pass);
    } catch (PDOException $e) {
        print("Error!: " . $e->getMessage() . "<br/>");
        die();
    }
    ?>
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