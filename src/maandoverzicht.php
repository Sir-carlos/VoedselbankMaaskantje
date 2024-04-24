<?php
// Verbinding maken met de database (voorbeeld)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voedselbank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Functie om maandoverzicht per productcategorie per postcode te genereren
function generateMaandOverzicht($maand, $jaar) {
    global $conn;

    // Maand- en jaarconditie voor SQL-query
    $maandJaarCondition = "MONTH(datum) = $maand AND YEAR(datum) = $jaar";

    // Query voor geleverde producten per categorie
    $queryGeleverdeProducten = "SELECT p.categorie, SUM(l.aantal) AS totaal_geleverd
                                FROM leveringen l
                                JOIN producten p ON l.product_id = p.id
                                WHERE $maandJaarCondition
                                GROUP BY p.categorie";

    // Query voor uitgedeelde voedselpakketten per postcode per categorie
    $queryUitgedeeldePakketten = "SELECT p.categorie, c.postcode, COUNT(v.id) AS aantal_pakketten
                                   FROM voedselpakketten v
                                   JOIN klanten c ON v.klant_id = c.id
                                   JOIN producten p ON v.product_id = p.id
                                   WHERE $maandJaarCondition
                                   GROUP BY p.categorie, c.postcode";

    // Uitvoeren van de queries
    $resultGeleverdeProducten = $conn->query($queryGeleverdeProducten);
    $resultUitgedeeldePakketten = $conn->query($queryUitgedeeldePakketten);

    // Verwerken en weergeven van de resultaten
    if ($resultGeleverdeProducten->num_rows > 0 || $resultUitgedeeldePakketten->num_rows > 0) {
        echo "<h2>Maandoverzicht $maand/$jaar</h2>";

        echo "<h3>Geleverde producten per categorie:</h3>";
        echo "<ul>";
        while ($row = $resultGeleverdeProducten->fetch_assoc()) {
            echo "<li>{$row['categorie']}: {$row['totaal_geleverd']}</li>";
        }
        echo "</ul>";

        echo "<h3>Uitgedeelde voedselpakketten per postcode per categorie:</h3>";
        echo "<ul>";
        while ($row = $resultUitgedeeldePakketten->fetch_assoc()) {
            echo "<li>{$row['categorie']} (postcode {$row['postcode']}): {$row['aantal_pakketten']} pakketten</li>";
        }
        echo "</ul>";
    } else {
        echo "Geen gegevens gevonden voor deze maand en jaar.";
    }

    // Sluiten van databaseverbinding
    $conn->close();
}

// Voorbeeldgebruik van de functie
$maand = 4; // Voor april
$jaar = 2024;
generateMaandOverzicht($maand, $jaar);
?>
