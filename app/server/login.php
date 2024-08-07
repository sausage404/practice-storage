<?php
require "../../config.php";
require "../lib/query.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (!isset($email) || !isset($password)) {
    header('Location: /test-mode/auth/login.php?error=กรุณากรอกข้อมูลให้ครบถ้วน');
    exit();
}

$user = getUserByEmail($email);

if ($user->rowCount() == 0) {
    header('Location: /test-mode/auth/login.php?error=ไม่พบบัญชีผู้ใช้');
    exit();
}

$user = $user->fetch(PDO::FETCH_ASSOC);

if (!password_verify($password, $user['password'])) {
    header('Location: /test-mode/auth/login.php?error=รหัสผ่านไม่ถูกต้อง');
    exit();
}

$_SESSION['user'] = $user;

header('Location: /test-mode/');