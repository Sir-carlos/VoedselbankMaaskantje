<?php require_once 'database.php';

$query = $dbh->prepare(
    "SELECT * FROM klanten 
        INNER JOIN eisen_has_klanten ON klanten.idklanten = eisen_has_klanten.klanten_idklanten
        INNER JOIN eisen ON eisen.ideisen = eisen_has_klanten.eisen_ideisen;");
    $result = $query->execute();
    $all = $query->fetchAll();

$q = $_REQUEST["q"];

//if($q !== ""){

    foreach($all as $key => $value){
        if($value['1'] === $q){
            $a[] = $value['eis'];
    }
}  
$json = json_encode($a);
echo($json);