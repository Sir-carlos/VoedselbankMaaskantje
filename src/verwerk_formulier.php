<?php
$user = "deeldesi_gerard";
$pass = "O33!1sda8";

try {
    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=deeldesi_voedselbank', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// Haal het laatste ID op uit de database
$sql_last_id = "SELECT MAX(idklanten) AS last_id FROM klanten";
$stmt_last_id = $dbh->query($sql_last_id);
$last_id_row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
$last_id = $last_id_row['last_id'];

// Verhoog het ID met 1 voor de nieuwe klant
$new_id = $last_id + 1;

// Ontvang de formuliergegevens
$naam = $_POST['veld1']; // Veld 1 is Naam in tabel klanten
$postcode = $_POST['veld2']; // Veld 2 is Postcode
$adres = $_POST['veld3']; // Veld 3 is Adres
$volwassen = $_POST['veld4']; // Veld 4 is Volwassenen
$email = $_POST['veld5']; // Veld 5 is Email
$kinderen = $_POST['veld6']; // Veld 6 is Kinderen
$telefoonnummer = $_POST['veld7']; // Veld 7 is Telefoonnummer
$babys = $_POST['veld8']; // Veld 8 is Baby's

// SQL-query om de gegevens in te voegen
$sql = "INSERT INTO klanten (idklanten, naam, adres, postcode, telefoonnummer, email, volwassen, kinderen, babys) 
        VALUES (:id, :naam, :adres, :postcode, :telefoonnummer, :email, :volwassen, :kinderen, :babys)";

// Voorbereiden van de SQL-statement
$stmt = $dbh->prepare($sql);

// Binding van parameters
$stmt->bindParam(':id', $new_id);
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':adres', $adres);
$stmt->bindParam(':postcode', $postcode);
$stmt->bindParam(':telefoonnummer', $telefoonnummer);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':volwassen', $volwassen);
$stmt->bindParam(':kinderen', $kinderen);
$stmt->bindParam(':babys', $babys);

// Uitvoeren van de SQL-statement
try {
    $stmt->execute();
    echo "Formulier succesvol verzonden. Klant toegevoegd met ID: " . $new_id;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Sluit de databaseverbinding
$dbh = null;
?>
