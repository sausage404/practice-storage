<?php
session_start();
$index = $_GET['index'];
unset($_SESSION['cart'][$index]);
header("Location: /test-mode/cart.php?success=ลบสินค้าในตะกร้าสินค้าเรียบร้อย");