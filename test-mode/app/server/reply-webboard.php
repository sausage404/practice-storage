<?php
session_start();
require "../../config.php";

$id = $_POST['id'];
$content = $_POST['content'];

if (!isset($_SESSION['user'])) {
    header("Location: /test-mode/auth/login.php");
    exit();
}

if (!isset($id) || !isset($content)) {
    header("Location: /test-mode/webboard.php?error=กรุณากรอกข้อมูลให้ครบ");
    exit();
}

$stmt = $conn->prepare("INSERT INTO replies (user_id, webboard_id, content) VALUES (?, ?, ?)");
$stmt->execute([$_SESSION['user']['id'], $id, $content]);
header("Location: /test-mode/webboard.php?success=เพิ่มความคิดเห็นเรียบร้อยแล้ว");