<?php
// Databaseverbinding
include 'database.php';

// Ontvang zoekterm
$searchTerm = $_GET['q'];

// Bereid de query voor (let op: voorkom SQL-injectie)
$query = $dbh->prepare("SELECT * FROM producten WHERE naam OR ean LIKE ?");
$query->execute(["%$searchTerm%"]);
$results = $query->fetchAll();

// Toon resultaten
foreach ($results as $key => $result) {
    echo "<tr>
            <td>" . $result["naam"] . "</td>
            <td>" . $result["idcategorie"] . "</td>
            <td>" . $result["ean"] . "</td>
            <td>" . $result["aantal"] . "</td>
            <td> <a href='producten_bewerken.php?q=". $result['idproduct']-1 ."'><img src='bewerken.png' class='bimg' onclick='sendkey($result[idproduct])'></a> </td>
        </tr>";
}
