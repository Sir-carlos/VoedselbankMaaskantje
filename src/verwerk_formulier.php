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
$naam = $_POST['veld1']; // Veld 1 is Naam in tabel klanten
$postcode = $_POST['veld2']; // Veld 2 is Postcode
$adres = $_POST['veld3']; // Veld 3 is Adres
$volwassen = $_POST['veld4']; // Veld 4 is Volwassenen
$email = $_POST['veld5']; // Veld 5 is Email
$kinderen = $_POST['veld6']; // Veld 6 is Kinderen
$telefoonnummer = $_POST['veld7']; // Veld 7 is Telefoonnummer
$babys = $_POST['veld8']; // Veld 8 is Baby's

// Ontvang de eis van het formulier
$eis = $_POST['eisen'];
$custom_eis = $_POST['custom_eis'];

// Controleer of een eis is geselecteerd of een aangepaste eis is ingevoerd
if (!empty($eis)) {
    $eis_toevoegen = $eis;
} else {
    $eis_toevoegen = $custom_eis;
}

// SQL-query om de gegevens in te voegen
// SQL-query om de gegevens in te voegen
// SQL-query om de gegevens in te voegen in klanten
$sql_klanten = "INSERT INTO klanten (idklanten, naam, adres, postcode, telefoonnummer, email, volwassen, kinderen, `baby's`) 
        VALUES (:id, :naam, :adres, :postcode, :telefoonnummer, :email, :volwassen, :kinderen, :babys)";

// Voorbereiden van de SQL-statement voor klanten
$stmt_klanten = $dbh->prepare($sql_klanten);

// Binding van parameters voor klanten
$stmt_klanten->bindParam(':id', $new_id);
$stmt_klanten->bindParam(':naam', $naam);
$stmt_klanten->bindParam(':adres', $adres);
$stmt_klanten->bindParam(':postcode', $postcode);
$stmt_klanten->bindParam(':telefoonnummer', $telefoonnummer);
$stmt_klanten->bindParam(':email', $email);
$stmt_klanten->bindParam(':volwassen', $volwassen);
$stmt_klanten->bindParam(':kinderen', $kinderen);
$stmt_klanten->bindParam(':babys', $babys);

// Uitvoeren van de SQL-statement voor klanten
try {
    $stmt_klanten->execute();
    echo "Formulier succesvol verzonden. Klant toegevoegd met ID: " . $new_id;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Nu de klant is toegevoegd, halen we het gegenereerde klant-ID op
// SQL-query om het laatst ingevoegde ID op te halen
$sql_last_id = "SELECT MAX(idklanten) AS last_id FROM klanten";
$stmt_last_id = $dbh->query($sql_last_id);
$last_id_row = $stmt_last_id->fetch(PDO::FETCH_ASSOC);
$last_id = $last_id_row['last_id'];

// Verhoog het ID met 1 voor de nieuwe klant
$new_id = $last_id + 1;

// Nu voegen we de eisen toe aan de tabel eisen_has_klanten
// SQL-query om de eisen in te voegen in eisen_has_klanten
$sql_eisen = "INSERT INTO eisen_has_klanten (eisen_ideisen, klanten_idklanten) 
              VALUES (:eis_id, :klant_id)";

// Voorbereiden van de SQL-statement voor eisen
$stmt_eisen = $dbh->prepare($sql_eisen);

// Binding van parameters voor eisen
$stmt_eisen->bindParam(':eis_id', $eis_toevoegen); // De ID van de eis
$stmt_eisen->bindParam(':klant_id', $last_id); // Het ID van de klant

// Uitvoeren van de SQL-statement voor eisen
try {
    $stmt_eisen->execute();
    echo " Eisen succesvol toegevoegd";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


// Sluit de databaseverbinding
$dbh = null;
?>
