<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=db_test_mode", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function uuid()
{
    $bytes = random_bytes(3);
    $uuid = bin2hex($bytes);
    return strtoupper($uuid);
}