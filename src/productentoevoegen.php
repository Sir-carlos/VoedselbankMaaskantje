<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>
    <div class="form-containersmall">
        <h2>Vul het formulier in</h2>
        <form action="verwerk_formulier.php" method="post">
            <div>
                <div class="form-group">
                    <label for="ean">EAN:</label>
                    <input type="text" id="ean" name="ean" required>
                </div>
                <div class="form-group">
                    <label for="name">Naam:</label>
                    <input type="text" id="name" name="name" required>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="category">Categorie:</label>
                    <select id="category" name="category" required>
                        <option value="">Selecteer categorie</option>
                        <option value="categorie1">Categorie 1</option>
                        <option value="categorie2">Categorie 2</option>
                        <option value="categorie3">Categorie 3</option>
                        <!-- Voeg hier meer categorieën toe indien nodig -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Aantal:</label>
                    <input type="number" id="quantity" name="quantity" required>
                </div>
            </div>
            <button type="submit">Verzenden</button>
        </form>
    </div>
</body>
</html>
