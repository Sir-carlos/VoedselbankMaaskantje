<?php
        session_start();
        require_once 'database.php';

try{
    $query = $dbh->prepare(
        "SELECT * FROM gebruiker WHERE `gebruikersnaam` = '". $_REQUEST['gebruikersnaam'] ."';");
        $result = $query->execute();
        $all = $query->fetchAll();
}catch(PDOException $e){
    echo($e);
};


if(empty($all[0]['gebruikersnaam'])){
    echo("User not found");
    header("?error=tata");
}else if($all[0]['gebruikersnaam'] === $_REQUEST['gebruikersnaam']){
    echo("User found");
    if($all[0]['wachtwoord'] === $_REQUEST['wachtwoord']){
        echo("Password Correct");

        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $all[0]['gebruikersnaam'];
        $_SESSION['functie'] = $all[0]['functie'];

        header("location: index.php");

    }else{
        echo("Password Incorrect");
    }
}