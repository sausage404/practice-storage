<?php
session_start();
require "../../config.php";

$address = $_POST['address'];

if (!isset($_SESSION['user'])) {
    header('Location: /test-mode/auth/login.php');
    exit();
}

if(!isset($_POST['address'])) {
    header('Location: /test-mode/cart.php?error=กรุณากรอกที่อยู่การจัดส่ง');
    exit();
}

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header('Location: /test-mode/cart.php?error=ไม่มีสินค้าในตะกร้า');
    exit();
}

$product_ids;
$quantitys;

foreach ($_SESSION['cart'] as $key => $cart) {
    $product_ids[] = $cart['id'];
    $quantitys[] = $cart['quantity'];
}

$stmt = $conn->prepare("INSERT INTO orders (user_id, address, product_id, quantity, create_at) VALUES (?, ?, ?, ?, NOW())");
$stmt->execute([$_SESSION['user']['id'], $address, json_encode($product_ids), json_encode($quantitys)]);
unset($_SESSION['cart']);

header("Location: /test-mode/cart.php?success=สั่งซื้อสินค้าเรียบร้อย");