<?php
require "../../config.php";
$id = $_GET['id'];

if (!isset($id)) {
    header('Location: /test-mode/auth/login.php?error=กรุณากรอกข้อมูลให้ครบถ้วน');
    exit();
}

$stmt = $conn->prepare("UPDATE orders SET status = 2, message = ? WHERE id = ?");
$stmt->execute(['กำลังจัดส่งสินค้า', $id]);
header('Location: /test-mode/admin/order.php?success=จัดส่งสินค้าสําเร็จ');