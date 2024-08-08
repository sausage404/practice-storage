<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=db_test_mode", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$referer = $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($referer);

if (strpos($parsed_url['path'], "admin")) {
    $role = $_SESSION['user']['role'];
    if ($role != "admin") {
        header("Location: /test-mode/index.php");
    }
}