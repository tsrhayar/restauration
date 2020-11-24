<?php

$dsn = "mysql:host=localhost;dbname=restauration";
$user = "root";
$pass = '';

try {
    $db = new PDO($dsn, $user, $pass);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "ERROR" . $e->getMessage();
}