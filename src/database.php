<?php
$user = "deeldesi_gerard";
$pass = "O33!1sda8";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=voedselbank', $user, $pass);
} catch (PDOException $e) {
    print("Error!: " . $e->getMessage() . "<br/>");
    die();
}
