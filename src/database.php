<?php
$user = "root";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=voedselbank', $user, $pass);
} catch (PDOException $e) {
    print("Error!: " . $e->getMessage() . "<br/>");
    die();
}
