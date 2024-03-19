<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px; /* Breder maken */
        }
		
		.form-containersmall {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px; /* Breder maken */
        }
	
        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-group {
            flex-basis: calc(50% - 10px); /* 50% breedte met tussenruimte van 10px */
            margin-bottom: 20px; /* Ruimte toevoegen aan de onderkant */
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: calc(100% - 20px); /* Neem 100% breedte minus de padding */
            padding: 10px; /* Voeg padding toe aan de invoervelden */
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50; /* Groene kleur */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049; /* Donkerder groen bij hover */
        }
    </style>
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
