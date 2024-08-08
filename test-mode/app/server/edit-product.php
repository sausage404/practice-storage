<?php
require "../lib/query.php";
require "../../config.php";

$id = $_GET['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['detail'];
$status = $_POST['status'];
$category = $_POST['category'];
$file = $_FILES['image'];

$existProduct = getProductById($id);

if ($existProduct->rowCount() == 0) {
    header('Location: /test-mode/admin/product.php?error=ไม่พบสินค้าที่ต้องการแก้ไข');
    exit();
}

$product = $existProduct->fetch(PDO::FETCH_ASSOC);

if (!isset($name) || !isset($price) || !isset($detail) || !isset($status) || !isset($category)) {
    header('Location: /test-mode/admin/product.php?error=กรุณากรอกข้อมูลให้ครบถ้วน');
    exit();
}

if ($file['error'] === UPLOAD_ERR_OK) {
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allow = ['jpg', 'jpeg', 'png'];
    if (in_array($ext, $allow)) {
        $image = uniqid() . '.' . $ext;
        unlink("../uploads/" . $product['image']);
        move_uploaded_file($file['tmp_name'], "../uploads/" . $image);
    }
}

$isImage = isset($image) ? $image : $product['image'];

$stmt = $conn->prepare("UPDATE products SET name = ?, price = ?, detail = ?, status = ?, category = ?, image = ? WHERE id = ?");
$stmt->execute([$name, $price, $detail, $status, $category, $isImage, $id]);
header("Location: /test-mode/admin/product.php?success=แก้ไขสินค้า $name สําเร็จ");