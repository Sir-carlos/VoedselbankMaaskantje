<?php require_once 'database.php';

$query = $dbh->prepare(
    "SELECT * FROM producten 
            INNER JOIN categorie ON producten.idcategorie = categorie.idcategorie;");
    $result = $query->execute();
    $all = $query->fetchAll();

$q = $_REQUEST["q"];

//if($q !== ""){
    foreach($all as $key => $value){
        if($value['1'] === $q){
            $json = json_encode($value);
            echo($json);
    }
}  