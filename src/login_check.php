<?php

require_once 'database.php';

try{
    $query = $dbh->prepare(
        "SELECT * FROM gebruiker WHERE username = '". $_REQUEST['usernaam'] ."';");
        $result = $query->execute();
        $all = $query->fetchAll();
}catch(PDOException $e){
    echo($e);
};


if(empty($all[0]['username'])){
    echo("User not found");
    header("?error=tata");
}else if($all[0]['username'] === $_REQUEST['usernaam']){
    echo("User found");
    if($all[0]['password'] === $_REQUEST['password']){
        echo("Password Correct");
    }else{
        echo("Password Incorrect");
    }
}