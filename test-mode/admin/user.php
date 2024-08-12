<!DOCTYPE html>
<html lang="en">

<?php
require "../app/components/layout/head.php";
require "../config.php";
require "../app/lib/query.php";
?>

<body>
    <?php require "../app/components/layout/navbar.php" ?>
    <div class="container-fluid pt-3" style="min-height: 85.5vh;">
        <?php if (isset($_GET['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <button class="btn-close float-end" onclick="location.href=location.href.split('?')[0]"></button>
                <strong>สําเร็จ</strong> <?php echo $_GET['success']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-danger" role="alert">
                <strong>เกิดข้อผิดพลาด</strong> <?php echo $_GET['error']; ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <h5 class="fw-bold">จัดการผู้ใช้งาน</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">อีเมล</th>
                        <th scope="col">บทบาท</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (getUsers()->fetchAll() as $user) { ?>
                        <tr>
                            <td><?= $user['id']; ?></td>
                            <td class="text-nowrap"><?= $user['name']; ?></td>
                            <td class="text-nowrap"><?= $user['email']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td class="text-nowrap">
                                <a href="../app/server/remove-user.php?id=<?= $user['id']; ?>" class="btn btn-sm btn-danger">ลบ</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require "../app/components/layout/footer.php" ?>
</body>

</html>