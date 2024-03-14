<?php
        session_start();
        require_once 'database.php';

try{
    $query = $dbh->prepare(
        "SELECT * FROM gebruiker WHERE `gebruikersnaam` = '". $_SESSION['name'] ."';");
        $result = $query->execute();
        $all = $query->fetchAll();
}catch(PDOException $e){
    echo($e);
};

if(empty($all)){
    echo("Wachtwoord niet gevonden");
}elseif($all[0]['gebruikersnaam'] == $_SESSION['name']){
    if($all[0]['wachtwoord'] == $_POST['hwachtwoord']){
        if($result = $dbh -> query("UPDATE gebruiker SET wachtwoord = '" . $_POST['nwachtwoord'] . "' WHERE idusers = '". $all[0]['idusers'] ."';")){
            echo("Insertion Successfully");
        }else{
            echo("Insertion Failed");
        };
    }
}else{
    echo("Wachtwoord niet gevonden");
}

/*print_r($_POST);
print_r($all);
print_r($_SESSION);*/