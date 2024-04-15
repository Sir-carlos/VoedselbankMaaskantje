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
$sql_last_id = "SELECT MAX(idklanten) AS last_id FROM klanten";
$stmt_last_id = $dbh->query($sql_last_id);
$last_id_row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
$last_id = $last_id_row['last_id'];

// Verhoog het ID met 1 voor de nieuwe klant
$new_id = $last_id + 1;

// Ontvang de formuliergegevens
$naam = $_POST['bedrijf']; // Bedrijf
$postcode = $_POST['postcode']; // Postcode
$adres = $_POST['adres']; // Adres
$telefoonnummer = $_POST['telefoon']; // Telefoon
$email = $_POST['email']; // Email contactpersoon
$contactpersoon = $_POST['naam']; // Naam contactpersoon
$leverdatum = $_POST['leverdatum']; // Eerstvolgende leverdatum

// SQL-query om de gegevens in te voegen
$sql = "INSERT INTO leveranciers (id, Bedrijf, Contactpersoon, telefoonnummer, email, Postcode, `Volgende levering`) 
        VALUES (:id, :bedrijf, :contactpersoon, :telefoonnummer, :email, :postcode, :leverdatum)";

// Voorbereiden van de SQL-statement
$stmt = $dbh->prepare($sql);

// Binding van parameters
$stmt->bindParam(':id', $new_id);
$stmt->bindParam(':bedrijf', $naam);
$stmt->bindParam(':postcode', $postcode);
$stmt->bindParam(':telefoonnummer', $telefoonnummer);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':contactpersoon', $contactpersoon);
$stmt->bindParam(':leverdatum', $leverdatum);

// Uitvoeren van de SQL-statement
try {
    $stmt->execute();
    echo "Formulier succesvol verzonden. Leverancier toegevoegd met ID: " . $new_id;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Sluit de databaseverbinding
$dbh = null;
?>
