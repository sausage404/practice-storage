<?php
require "../../config.php";
require "../lib/query.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if (!isset($username) || !isset($email) || !isset($password) || !isset($confirmPassword)) {
    header('Location: /test-mode/auth/register.php?error=กรุณากรอกข้อมูลให้ครบถ้วน');
    exit();
}

if ($password != $confirmPassword) {
    header('Location: /test-mode/auth/register.php?error=รหัสผ่านไม่ตรงกัน');
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: /test-mode/auth/register.php?error=อีเมลไม่ถูกต้อง');
    exit();
}

if (getUserByEmail($email)->rowCount() > 0) {
    header('Location: /test-mode/auth/register.php?error=อีเมลนี้มีผู้ใช้งานแล้ว');
    exit();
}

$query = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$query->execute([$username, $email, password_hash($password, PASSWORD_BCRYPT)]);

header('Location: /test-mode/auth/login.php');
