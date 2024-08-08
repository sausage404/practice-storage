<!DOCTYPE html>
<html lang="en">

<?php
require "../app/components/layout/head.php";
require "../config.php";
require "../app/components/ui/add-product.php"
?>

<body>
    <?php require "../app/components/layout/navbar.php" ?>
    <div class="container-lg" style="min-height: 100vh;">
        <div class="row" style="padding-top: 7rem;row-gap: 1rem;">
            <div class="col-lg-3">
                <?php require "../app/components/layout/sidebar.php" ?>
            </div>
            <div class="col-lg-9">
                <div class="bg-light p-3 rounded border">
                    <div class="mb-3">
                        <button data-bs-toggle="modal" data-bs-target="#add-product" class="btn btn-sm btn-success ms-3 float-end">เพิ่มสินค้า</button>
                        <h5 class="fw-bold">จัดการสินค้า</h5>
                    </div>
                    <div class="table-responesive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">รูป</th>
                                    <th scope="col">ชื่อสินค้า</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col">ชนิด</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">คะแนน</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "../app/components/layout/footer.php" ?>
</body>

</html>