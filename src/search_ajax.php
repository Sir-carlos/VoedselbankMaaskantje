<?php require_once 'database.php';

$query = $dbh->prepare(
    "SELECT * FROM producten 
    INNER JOIN categorie ON producten.idcategorie = categorie.idcategorie;");
    $result = $query->execute();
    $all = $query->fetchAll();

foreach($all as $key => $value){
    echo(
        "<tr>
        <td>" . $value["1"] . "</td>
        <td>" . $value["6"] . "</td>
        <td>" . $value["ean"] . "</td>
        <td>" . $value["aantal"] . '</td>
        <td> <a href="producten_bewerken.php?q='. $key .'"><img src="bewerken.png" class="bimg" onclick="sendkey($key)"></a> </td>
        </tr>'
      );
};
