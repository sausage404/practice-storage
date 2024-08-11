<?php
require "../../config.php";
require "../lib/query.php";

$id = $_GET['id'];

if (!isset($id)) {
    header("Location: /test-mode/admin/webboard.php?error=กรุณาเลือกหัวข้อที่ต้องการลบ");
    exit();
}

$existWebboard = getWebboardById($id);
if ($existWebboard->rowCount() == 0) {
    header("Location: /test-mode/admin/webboard.php?error=ไม่พบสินค้าที่ต้องการลบ");
    exit();
}

$webboard = $existWebboard->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("DELETE FROM webboards WHERE id = ?");
$stmt->execute([$id]);
header("Location: /test-mode/admin/webboard.php?success=ลบสินค้า $webboard[name] สําเร็จ");