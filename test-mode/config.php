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

$referer = $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($referer);


if (strpos($parsed_url['path'], "admin")) {
    $role = $_SESSION['role'];
    print_r($role);
    if ($role != "admin") {
        header("Location: /test-mode/index.php");
    }
}