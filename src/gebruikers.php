<!DOCTYPE html>
<html lang="en">
<?php include 'header.html' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Pagina</title>
    <?php require_once 'database.php';?>
</head>
<body>
    <h1>Gebruikers</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Rank</th>
        </tr>
        <?php
        $query = $dbh->prepare(
            "SELECT * FROM gebruiker;");
            $result = $query->execute();
            $all = $query->fetchAll();

            foreach($all as $key => $value){
                echo(
                    "<tr>
                    <td>" . $value["username"] . "</td>
                    <td>" . $value["password"] . "</td>
                    <td>" . $value["rank"] . "</td>
                    </tr>"
                  );
            }
        ?>
    </table>
</body>
    <script src="script.js"></script>
</html>