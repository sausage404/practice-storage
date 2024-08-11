<?php
session_start();
require "../../config.php";

$title = $_POST['title'];
$content = $_POST['content'];

if (!isset($_SESSION['user'])) {
    header("Location: /test-mode/auth/login.php");
    exit();
}

if (!isset($title) || !isset($content)) {
    header("Location: /test-mode/webboard.php?error=กรุณากรอกข้อมูลให้ครบ");
    exit();
}

$stmt = $conn->prepare("INSERT INTO webboards (user_id, title, content) VALUES (?, ?, ?)");
$stmt->execute([$_SESSION['user']['id'], $title, $content]);
header("Location: /test-mode/webboard.php?success=เพิ่มหัวข้อเรียบร้อยแล้ว");
