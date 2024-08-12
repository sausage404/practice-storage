<!DOCTYPE html>
<html lang="en">

<?php
require "./app/components/layout/head.php";
require "./config.php";
require "./app/lib/query.php";
require "./app/components/ui/add-order.php"
?>

<body>
    <?php require "./app/components/layout/navbar.php" ?>
    <div class="container" style="min-height: 100vh;">
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
            <button data-bs-toggle="modal" data-bs-target="#add-order" class="btn btn-sm btn-success ms-3 float-end">สั่งซื้อสินค้า</button>
            <h5 class="fw-bold">ตะกร้าสินค้า</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped border">
                <thead>
                    <tr>
                        <th scope="col">รูป</th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ราคา</th>
                        <th scope="col">จํานวน</th>
                        <th scope="col">ราคารวม</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $total = 0;
                        foreach ($_SESSION['cart'] as $key => $cart) {
                            $product = getProductById($cart['id'])->fetch(PDO::FETCH_ASSOC);
                            $total += $product['price'] * $cart['quantity'];
                    ?>
                            <tr>
                                <td><img src="./app/uploads/<?= $product['image'] ?>" width="100" height="100"></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $cart['quantity'] ?></td>
                                <td><?= $product['price'] * $cart['quantity'] ?></td>
                                <td><a href="/test-mode/app/server/remove-cart.php?index=<?= $key ?>" class="btn btn-danger btn-sm">ลบ</a></td>
                            </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="6" class="text-center">ไม่มีสินค้าในตะกร้า</td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr class="fw-bold">
                        <td class="text-end" colspan="5">ราคารวมทั้งหมด</td>
                        <td><?= $total ?? 0 ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php require "./app/components/layout/footer.php" ?>
</body>

</html>