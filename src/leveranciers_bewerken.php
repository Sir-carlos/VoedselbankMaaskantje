<!DOCTYPE html>
<html lang="nl">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Leveranciers</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>
    <div class="form-container">
        <h2>Bewerk Leveranciers</h2>
        <?php
        // Verbind met de database
        $user = "root";
        $pass = "";

        try {
            $dbh = new PDO('mysql:host=localhost;port=3306;dbname=voedselbank', $user, $pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        // Haal de ID van de leverancier op uit de querystring
        $id = $_GET['id'];

        // Haal de gegevens van de leverancier op uit de database
        $query = $dbh->prepare("SELECT * FROM leveranciers WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $leverancier = $query->fetch(PDO::FETCH_ASSOC);

        // Check of er een leverancier met het opgegeven ID is gevonden
        if ($leverancier) {
            ?>
            <form action="leveranciersverwerken.php" method="post">
                <input type="hidden" name="id" value="<?php echo $leverancier['id']; ?>">
                <div class="form-row">
                    <div class="form-group">
                        <label for="bedrijf">Bedrijf:</label>
                        <input type="text" id="bedrijf" name="bedrijf" value="<?php echo $leverancier['Bedrijf']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" name="postcode" value="<?php echo $leverancier['Postcode']; ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="adres">Adres:</label>
                        <input type="text" id="adres" name="adres" value="<?php echo $leverancier['Adres']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telefoon">Telefoon:</label>
                        <input type="tel" id="telefoon" name="telefoon" value="<?php echo $leverancier['telefoonnummer']; ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email contactpersoon:</label>
                        <input type="email" id="email" name="email" value="<?php echo $leverancier['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="naam">Naam contactpersoon:</label>
                        <input type="text" id="naam" name="naam" value="<?php echo $leverancier['Contactpersoon']; ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="leverdatum">Eerstvolgende leverdatum:</label>
                        <input type="date" id="leverdatum" name="leverdatum" value="<?php echo $leverancier['Volgende levering']; ?>" required>
                    </div>
                </div>
                <button type="submit">Opslaan</button>
            </form>
            <?php
        } else {
            echo "Leverancier niet gevonden.";
        }
        ?>
    </div>
</body>
</html>
<?php
// Sluit de databaseverbinding
$dbh = null;
?>
