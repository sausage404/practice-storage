<?php
session_start();
require "../../config.php";
require "../lib/query.php";
require "../lib/point.php";

$id = $_POST['id'];
$point = $_POST['point'];
if(!isset($_SESSION['user'])) {
    header("Location: /test-mode/auth/login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];

if(!isset($id) || !isset($point)) {
    header("Location: /test-mode/detail.php?id=$id&error=ข้อมูลไม่ถูกต้อง");
    exit();
}

if(!isset($_SESSION['user']['id'])) {
    header("Location: /test-mode/login.php");
    exit();
}

if($point < 1 || $point > 5) {
    header("Location: /test-mode/detail.php?id=$id&error=คะแนนไม่ถูกต้อง");
    exit();
}

$pointsync = new Point($id);
$pointsync->setPoint($point, $user_id);

header("Location: /test-mode/detail.php?id=$id&&success=ส่งคะแนนสําเร็จ");