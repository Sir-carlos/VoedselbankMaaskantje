<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker Toevoegen</title>
    <link rel="stylesheet" href="formstyle.css">
    <script>
        function validatePassword() {
            var password = document.getElementById("wachtwoord").value;
            var confirmPassword = document.getElementById("bevestig_wachtwoord").value;
            if (password != confirmPassword) {
                alert("De wachtwoorden komen niet overeen!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="form-containersmall">
        <h2>Voeg een nieuwe gebruiker toe</h2>
        <form action="gebruikerverwerken.php" method="post" onsubmit="return validatePassword();">
            <div>
                <div class="form-group">
                    <label for="gebruikersnaam">Gebruikersnaam:</label>
                    <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>
                </div>
                <div class="form-group">
                    <label for="wachtwoord">Wachtwoord:</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" required>
                </div>
                <div class="form-group">
                    <label for="bevestig_wachtwoord">Bevestig Wachtwoord:</label>
                    <input type="password" id="bevestig_wachtwoord" name="bevestig_wachtwoord" required>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="functie">Functie:</label>
                    <select id="functie" name="functie" required>
                        <option value="" disabled selected>Kies een functie</option>
                        <option value="Directie">Directie</option>
                        <option value="Medewerker">Medewerker</option>
                        <option value="vrijwilliger">Vrijwilliger</option>
                    </select>
                </div>
            </div>
            <button type="submit">Toevoegen</button>
        </form>
    </div>
</body>
</html>
