<?php
$user = "root";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=voedselbank', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// Haal het laatste ID op uit de database
$sql_last_id = "SELECT MAX(idusers) AS last_id FROM gebruiker";
$stmt_last_id = $dbh->query($sql_last_id);
$last_id_row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
$last_id = $last_id_row['last_id'];

// Verhoog het ID met 1 voor de nieuwe gebruiker
$new_id = $last_id + 1;

// Ontvang de formuliergegevens
$gebruikersnaam = $_POST['gebruikersnaam']; // Gebruikersnaam
$wachtwoord = $_POST['wachtwoord']; // Wachtwoord
$functie = $_POST['functie']; // Functie

// SQL-query om de gegevens in te voegen
$sql = "INSERT INTO gebruiker (idusers, gebruikersnaam, wachtwoord, functie) VALUES (:id, :gebruikersnaam, :wachtwoord, :functie)";

// Voorbereiden van de SQL-statement
$stmt = $dbh->prepare($sql);

// Binding van parameters
$stmt->bindParam(':id', $new_id);
$stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
$stmt->bindParam(':wachtwoord', $wachtwoord);
$stmt->bindParam(':functie', $functie);

// Uitvoeren van de SQL-statement
try {
    $stmt->execute();
    echo "Gebruiker succesvol toegevoegd met ID: " . $new_id;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Sluit de databaseverbinding
$dbh = null;
?>
