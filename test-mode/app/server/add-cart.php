<?php
session_start();
$id = $_POST['id'];
$quantity = $_POST['quantity'];

if (!isset($id) || !isset($quantity)) {
    header("Location: /test-mode/detail.php?id=$id&error=ข้อมูลไม่ถูกต้อง");
    die();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [
        ['id' => $id, 'quantity' => $quantity]
    ];
} else {
    $_SESSION['cart'] = array_merge($_SESSION['cart'], [
        ['id' => $id, 'quantity' => $quantity]
    ]);
}

header("Location: /test-mode/detail.php?id=$id&success=เพิ่มสินค้าในตะกร้าสินค้าเรียบร้อย");