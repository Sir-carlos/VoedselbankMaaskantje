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
    <div class="form-container">
        <h2>Vul het formulier in</h2>
        <form action="verwerk_formulier.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="veld1">Veld 1:</label>
                    <input type="text" id="veld1" name="veld1" required>
                </div>
                <div class="form-group">
                    <label for="veld2">Veld 2:</label>
                    <input type="text" id="veld2" name="veld2" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="veld3">Veld 3:</label>
                    <input type="text" id="veld3" name="veld3" required>
                </div>
                <div class="form-group">
                    <label for="veld4">Veld 4:</label>
                    <input type="text" id="veld4" name="veld4" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="veld5">Veld 5:</label>
                    <input type="text" id="veld5" name="veld5" required>
                </div>
                <div class="form-group">
                    <label for="veld6">Veld 6:</label>
                    <input type="text" id="veld6" name="veld6" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="veld7">Veld 7:</label>
                    <input type="text" id="veld7" name="veld7" required>
                </div>
                <div class="form-group">
                    <label for="veld8">Veld 8:</label>
                    <input type="text" id="veld8" name="veld8" required>
                </div>
            </div>
            <button type="submit">Verzenden</button>
        </form>
    </div>
</body>
</html>
