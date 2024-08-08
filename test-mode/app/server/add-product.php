<?php
require "../lib/query.php";
require "../../config.php";

$name = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['detail'];
$status = $_POST['status'];
$category = $_POST['category'];
$file = $_FILES['image'];

if ($file['error'] === UPLOAD_ERR_OK) {
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allow = ['jpg', 'jpeg', 'png'];
    if (in_array($ext, $allow)) {
        $image = uniqid() . '.' . $ext;
        move_uploaded_file($file['tmp_name'], "../uploads/" . $image);
    }
}

if(!isset($name) || !isset($price) || !isset($detail) || !isset($status) || !isset($category) || !isset($image)){
    header('Location: /test-mode/admin/product.php?error=กรุณากรอกข้อมูลให้ครบถ้วน');
    exit();
}

$stmt = $conn->prepare("INSERT INTO products (name, price, detail, status, category, image) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$name, $price, $detail, $status, $category, $image]);
header("Location: /test-mode/admin/product.php?success=เพิ่มสินค้า $name สําเร็จ");