<?php
// Databaseverbinding
include 'database.php';

// Ontvang zoekterm
$searchTerm = $_GET['q'];

// Bereid de query voor (let op: voorkom SQL-injectie)
$query = $dbh->prepare("SELECT * FROM voedselpakket WHERE naam LIKE ? ORDER BY idpakket DESC");
$query->execute(["%$searchTerm%"]);
$results = $query->fetchAll();

// Toon resultaten
foreach($results as $key => $value){
    echo(
        "<tr>
        <td>" . $value["idpakket"] . "</td>
        <td>" . $value["naam"] . "</td>
        <td>" . $value["aanmaak"] . "</td>
        <td>" . $value["uitgifte"] . '</td>
        <td> <a href="producten_bewerken.php?q='. $value['idpakket']-1 .'"><img src="bewerken.png" class="bimg" onclick="sendkey($key)"></a>');

        if(!$value['uitgifte']){
            echo('
            <a href=".php?q='. $key .'" onclick="event.preventDefault();"><img src="picked_up.png" class="bimg" onclick="ndate('. $value['idpakket'] .')"></a>
            </td>
             </tr>'
            );
        };
};
?>
