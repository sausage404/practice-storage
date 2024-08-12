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
            <h5 class="fw-bold">จัดการคําสั่งซื้อ</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ผู้สั่งซื้อ</th>
                        <th scope="col">ที่อยู่</th>
                        <th scope="col">รายการ</th>
                        <th scope="col">ราคารวม</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (getOrderByStatus(0)->fetchAll() as $order) {
                        $user = getUserById($order['user_id'])->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <tr>
                            <td><?= $order['id']; ?></td>
                            <td><?= $user['name']; ?></td>
                            <td><?= $order['address']; ?></td>
                            <td>
                                <?php
                                $total = 0;
                                $product_ids = json_decode($order['product_id']);
                                $quantitys = json_decode($order['quantity']);
                                foreach ($product_ids as $key => $product_id) {
                                    $product = getProductById($product_id)->fetch(PDO::FETCH_ASSOC);
                                    $total += $product['price'] * $quantitys[$key];
                                    echo $product['name'] . " " . $quantitys[$key] . " ชิ้น<br>";
                                }
                                ?>
                            </td>
                            <td><?= $total; ?></td>
                            <td class="text-nowrap">
                                <?php require "../app/components/ui/cancel-order.php" ?>
                                <a href="/test-mode/app/server/confirm-order.php?id=<?= $order['id'] ?>" class="btn btn-success btn-sm">ยืนยัน</a>
                                <button data-bs-toggle="modal" data-bs-target="#cancel-order<?= $order['id']; ?>" class="btn btn-danger btn-sm">ยกเลิก</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="mb-3">
            <h5 class="fw-bold">รับคําสั่งซื้อ</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped border">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ผู้สั่งซื้อ</th>
                        <th scope="col">ที่อยู่</th>
                        <th scope="col">รายการ</th>
                        <th scope="col">ราคารวม</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (getOrderByStatus(1)->fetchAll() as $order) {
                        $user = getUserById($order['user_id'])->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <tr>
                            <td><?= $order['id']; ?></td>
                            <td><?= $user['name']; ?></td>
                            <td><?= $order['address']; ?></td>
                            <td>
                                <?php
                                $total = 0;
                                $product_ids = json_decode($order['product_id']);
                                $quantitys = json_decode($order['quantity']);
                                foreach ($product_ids as $key => $product_id) {
                                    $product = getProductById($product_id)->fetch(PDO::FETCH_ASSOC);
                                    $total += $product['price'] * $quantitys[$key];
                                    echo $product['name'] . " " . $quantitys[$key] . " ชิ้น<br>";
                                }
                                ?>
                            </td>
                            <td><?= $total; ?></td>
                            <td class="text-nowrap">
                                <?php require "../app/components/ui/cancel-order.php" ?>
                                <a href="/test-mode/app/server/delivery-order.php?id=<?= $order['id'] ?>" class="btn btn-success btn-sm">จัดส่ง</a>
                                <button data-bs-toggle="modal" data-bs-target="#cancel-order<?= $order['id']; ?>" class="btn btn-danger btn-sm">ยกเลิก</button>
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