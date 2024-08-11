<?php
require "../../config.php";
require "../lib/query.php";

$id = $_GET['id'];

if (!isset($id)) {
    header("Location: /test-mode/admin/user.php?error=กรุณาเลือกสินค้าที่ต้องการลบ");
    exit();
}

$existProduct = getProductById($id);
if ($existProduct->rowCount() == 0) {
    header("Location: /test-mode/admin/user.php?error=ไม่พบสินค้าที่ต้องการลบ");
    exit();
}

$product = $existProduct->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);
header("Location: /test-mode/admin/user.php?success=ลบสินค้า $product[name] สําเร็จ");