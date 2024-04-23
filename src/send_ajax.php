<?php require_once 'database.php';

$query = $dbh->prepare(
    "SELECT * FROM voedselpakket;");
    $result = $query->execute();
    $all = $query->fetchAll();

    $last_id = end($all)[0];

$query = $dbh->prepare(
    "SELECT * FROM klanten;");
    $result = $query->execute();
    $klanten = $query->fetchAll();

$q = json_decode($_REQUEST['q'], true);

$klant_id = "";

foreach($klanten as $key => $value){
    if($value['naam'] == $q[0]['naam']){
        $klant_id = $value['idklanten'];
    }
}

foreach($q as $key => $value){
    $dbh -> query("INSERT INTO voedselpakket(`idpakket`, `naam`, `aanmaak`, `uitgifte`, `klanten_idklanten`, `producten`, `aantal`) VALUES('". $last_id + $key ."', '". $value['naam'] ."', now(), now(), '". $klant_id ."', '". $value['product'] ."', '". $value['aantal'] ."');");
}