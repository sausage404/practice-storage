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
    <div class="container-fluid" style="min-height: 100vh;">
        <div class="row" style="padding-top: 8rem;row-gap: 1rem;">
            <div class="col-12">
                <?php require "../app/components/layout/sidebar.php" ?>
            </div>
            <div class="col-12">
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
                    <button data-bs-toggle="modal" data-bs-target="#add-product" class="btn btn-sm btn-success ms-3 float-end">เพิ่มสินค้า</button>
                    <h5 class="fw-bold">จัดการสินค้า</h5>
                </div>
                <div class="table-responesive">
                    <table class="table table-hover table-striped border">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">รูป</th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">รายละเอียด</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">ชนิด</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">คะแนน</th>
                                <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (getProducts()->fetchAll() as $product) { ?>
                                <tr>
                                    <th scope="row"><?= $product['id']; ?></th>
                                    <td>
                                        <?php require "../app/components/ui/image.php" ?>
                                        <a class="text-primary" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#image<?= $product['id']; ?>">
                                            <?= $product['image']; ?>
                                        </a>
                                    </td>
                                    <td class="text-nowrap"><?= $product['name']; ?></td>
                                    <td>
                                        <?php require "../app/components/ui/detail.php" ?>
                                        <a class="text-primary" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#detail<?= $product['id']; ?>">
                                            คลิ๊กดู
                                        </a>
                                    </td>
                                    <td><?= $product['price']; ?></td>
                                    <td class="text-nowrap"><?= $product['category']; ?></td>
                                    <td class="text-nowrap"><?= $product['status'] ? 'พร้อมขาย' : 'ไม่พร้อมขาย'; ?></td>
                                    <td><?= $product['point'] ? $product['point'] : 0; ?></td>
                                    <td class="text-nowrap">
                                        <?php require "../app/components/ui/edit-product.php" ?>
                                        <button data-bs-toggle="modal" data-bs-target="#edit-product<?= $product['id']; ?>" class="btn btn-sm btn-warning">แก้ไข</button>
                                        <a href="../app/server/remove-product.php?id=<?= $product['id']; ?>" class="btn btn-sm btn-danger">ลบ</a>
                                    </td>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php require "../app/components/layout/footer.php" ?>
</body>

</html>