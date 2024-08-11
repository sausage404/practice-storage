<?php
require "../../config.php";
require "../lib/query.php";

$id = $_GET['id'];

if (!isset($id)) {
    header("Location: /test-mode/webboard.php?error=กรุณาเลือกการตอบกลับที่ต้องการลบ");
    exit();
}

$existReply = getReplyById($id);
if ($existReply->rowCount() == 0) {
    header("Location: /test-mode/webboard.php?error=ไม่พบการตอบกลับที่ต้องการลบ");
    exit();
}

$stmt = $conn->prepare("DELETE FROM replies WHERE id = ?");
$stmt->execute([$id]);
header("Location: /test-mode/webboard.php?success=ลบการตอบกลับสําเร็จ");