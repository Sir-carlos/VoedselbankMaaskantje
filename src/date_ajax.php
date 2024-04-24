<?php require_once 'database.php';

$q = $_REQUEST["q"];

if($result = $dbh -> query('UPDATE voedselpakket SET uitgifte = now() WHERE idpakket = '. $q .';')){
    echo("success");
}else{
    echo("failed");
}

