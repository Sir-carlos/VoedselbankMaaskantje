<!DOCTYPE html>
<html lang="nl">
<?php include 'header.php'; require_once 'database.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>
    <div class="form-container">
        <h2>Vul het formulier in</h2>
        <form action="leveranciersverwerken.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="bedrijf">Bedrijf:</label>
                    <input type="text" id="bedrijf" name="bedrijf" required>
                </div>
                <div class="form-group">
                    <label for="postcode">Postcode:</label>
                    <input type="text" id="postcode" name="postcode" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="adres">Adres:</label>
                    <input type="text" id="adres" name="adres" required>
                </div>
                <div class="form-group">
                    <label for="telefoon">Telefoon:</label>
                    <input type="tel" id="telefoon" name="telefoon" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email contactpersoon:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="naam">Naam contactpersoon:</label>
                    <input type="text" id="naam" name="naam" required>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="leverdatum">Eerstvolgende leverdatum:</label>
                    <input type="date" id="leverdatum" name="leverdatum" required>
                </div>
            </div>
            <button type="submit">Verzenden</button>
        </form>
    </div>
</body>
</html>
