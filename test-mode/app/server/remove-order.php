<?php
require "../../config.php";
$id = $_GET['id'];

if (!isset($id)) {
    header('Location: /test-mode/auth/login.php?error=กรุณากรอกข้อมูลให้ครบถ้วน');
    exit();
}

$stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
$stmt->execute([$id]);
header('Location: /test-mode/admin/order.php');
