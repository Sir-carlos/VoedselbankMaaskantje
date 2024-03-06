<?php
$user = "schooluser";
$pass = "Schooluser18!";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=voedselbank', $user, $pass);
} catch (PDOException $e) {
    print("Error!: " . $e->getMessage() . "<br/>");
    die();
}

try{
    $query = $dbh->prepare(
        "SELECT * FROM gebruiker WHERE username = '". $_REQUEST['username'] ."';");
        $result = $query->execute();
        $all = $query->fetchAll();
}catch(PDOException $e){
    echo($e);
};
try{
if(empty($all[0]['username'])){
    echo("ter");
}}catch(PDOException $e){
    echo($e);
}

print_r($all[0]['username']);