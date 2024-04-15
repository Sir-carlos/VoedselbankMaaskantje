<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home Pagina</title>
    <?php require_once 'database.php';?>
</head>
<body>
    <h1>Gebruikers</h1>

    <div class="control">
        <div class="search">
            <input type="search" id="site-search" name="search" placeholder="Zoeken . . ." />
        </div>
        <div class="box">
            <a href="gebruikers_toevoegen.php">
            <button class="button"><img src="plusicon.svg" class="svg" width="30px">Toevoegen</button>
            </a>
        </div>
    </div>

    <table class="content-table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Rank</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = $dbh->prepare(
            "SELECT * FROM gebruiker;");
            $result = $query->execute();
            $all = $query->fetchAll();

            foreach($all as $key => $value){
                echo(
                    "<tr>
                    <td>" . $value["gebruikersnaam"] . "</td>
                    <td>" . $value["wachtwoord"] . "</td>
                    <td>" . $value["functie"] . "</td>
                    </tr>"
                  );
            }
        ?>
        </tbody>
    </table>
</body>
    <script src="script.js"></script>
</html>