<?php
require "../../config.php";
$id = $_GET['id'];

if (!isset($id)) {
    header('Location: /test-mode/auth/login.php?error=กรุณากรอกข้อมูลให้ครบถ้วน');
    exit();
}

$stmt = $conn->prepare("UPDATE orders SET status = 1, message = ? WHERE id = ?");
$stmt->execute(['รับออเดอร์เรียบร้อย', $id]);
header('Location: /test-mode/admin/order.php?success=รับออเดอร์เรียบร้อย');