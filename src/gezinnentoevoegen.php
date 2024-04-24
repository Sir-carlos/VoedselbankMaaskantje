<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>
    <div class="form-wrapper">
    <div class="form-container">
        <h2>Vul het formulier in</h2>
        <form action="verwerk_formulier.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="veld1">Naam:</label>
                    <input type="text" id="veld1" name="veld1" required>
                </div>
                <div class="form-group">
                    <label for="veld2">Postcode:</label>
                    <input type="text" id="veld2" name="veld2" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="veld3">Adres:</label>
                    <input type="text" id="veld3" name="veld3" required>
                </div>
                <div class="form-group">
                    <label for="veld4">Volwassen:</label>
                    <input type="text" id="veld4" name="veld4" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="veld5">Email:</label>
                    <input type="text" id="veld5" name="veld5" required>
                </div>
                <div class="form-group">
                    <label for="veld6">Kinderen:</label>
                    <input type="text" id="veld6" name="veld6" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="veld7">Telefoonnummer</label>
                    <input type="text" id="veld7" name="veld7" required>
                </div>
                <div class="form-group">
                    <label for="veld8">Baby's:</label>
                    <input type="text" id="veld8" name="veld8" required>
                </div>
            </div>
            <div class="form-group">
    <label for="eisen">Eisen:</label>
    <select id="eisen" name="eisen">
        <option value="">Selecteer een eis</option>
        <?php
        // Query om bestaande eisen op te halen
        $sql_eisen = "SELECT * FROM eisen";
        $stmt_eisen = $dbh->query($sql_eisen);
        while ($row_eis = $stmt_eisen->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row_eis['eis'] . "'>" . $row_eis['eis'] . "</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="custom_eis">Of voeg een aangepaste eis toe:</label>
    <input type="text" id="custom_eis" name="custom_eis">
</div>

                
            <button type="submit" class="buttonz">Verzenden</button>
        </form>
    </div>
</body>
</html>
