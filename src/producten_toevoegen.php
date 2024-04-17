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
        <form action="producten.php" method="POST">
            <div class="form-containersmall">
            <h1>Producten Toevoegen</h1>
                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <input type="text" name="naam">
                </div>

                <div class="form-group">
                    <label for="categorie">Categorie</label>
                    <select name="categorie">
                        <?php
                        $query = $dbh->prepare("SELECT * FROM categorie;");
                        $result = $query->execute();
                        $all = $query->fetchAll();
                    
                        foreach($all as $key => $value){
                            echo('<option value="'. $value['naam'] .'">'. $value['naam'] .'</option>');
                        };  
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="aantal">Aantal:</label>
                    <input type="text" name="aantal">
                </div>
            </div>

            <button type="submit">Verzenden</button>
        </form>
    </div>

    <script>
        function add(data){
            var tr = document.createElement('tr');
            var td = document.createElement('td');
        }
    </script>

    <script src="script.js"></script>
</body>
</html>
