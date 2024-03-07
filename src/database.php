<?php
$user = "schooluser";
$pass = "Schooluser18!";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=voedselbank', $user, $pass);
} catch (PDOException $e) {
    print("Error!: " . $e->getMessage() . "<br/>");
    die();
}
