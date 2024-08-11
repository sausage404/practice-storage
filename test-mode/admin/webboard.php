<!DOCTYPE html>
<html lang="en">

<?php
require "../app/components/layout/head.php";
require "../config.php";
require "../app/lib/query.php";
require "../app/components/ui/add-product.php";
?>

<body>
    <?php require "../app/components/layout/navbar.php" ?>
    <div class="container-fluid" style="min-height: 100vh;margin-top: 9rem;">
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
            <h5 class="fw-bold">จัดการเวบบอร์ด</h5>
        </div>
        <div class="table-responesive">
            <table class="table table-hover table-striped border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">หัวข้อ</th>
                        <th scope="col">เนื้อหา</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">วันที่สร้าง</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (getWebboards()->fetchAll() as $webboard) {
                        $user = getUserById($webboard['user_id'])->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <tr>
                            <th scope="row"><?= $webboard['id']; ?></th>
                            <td class="text-nowrap"><?= $webboard['title']; ?></td>
                            <td>
                                <?php require "../app/components/ui/detail-webboard.php"; ?>
                                <a class="text-primary" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#detail-webboard<?= $webboard['id']; ?>">
                                    คลิ๊กดู
                                </a>
                            </td>
                            <td class="text-nowrap"><?= $user['name']; ?></td>
                            <td class="text-nowrap"><?= $webboard['create_at']; ?></td>
                            <td class="text-nowrap">
                                <a href="../app/server/remove-webboard.php?id=<?= $webboard['id']; ?>" class="btn btn-sm btn-danger">ลบ</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require "../app/components/layout/footer.php" ?>
</body>

</html>