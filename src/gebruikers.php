<!DOCTYPE html>
<html lang="en">
<?php include 'header.html' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Pagina</title>
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