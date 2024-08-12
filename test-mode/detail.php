<!DOCTYPE html>
<html lang="en">

<?php
require "./app/components/layout/head.php";
require "./config.php";
require "./app/lib/query.php";
require "./app/lib/point.php";
$product = getProductById($_GET['id'])->fetch(PDO::FETCH_ASSOC);

if ($product['status'] == 0) {
    header("Location: /test-mode");
    die();
}

$point;
if (isset($_SESSION['user'])) {
    $pointsync = getPointByUserIdAndProductId($_SESSION['user']['id'], $product['id']);
    if ($pointsync->rowCount() > 0)
        $point = $pointsync->fetch(PDO::FETCH_ASSOC)['point'];
    else
        $point = 0;
} else
    $point = 0;
?>

<body>
    <?php require "./app/components/layout/navbar.php" ?>
    <div class="container" style="padding-top: 7rem;min-height: 100vh;">
        <?php if (isset($_GET['success'])) : ?>
            <div class="alert alert-success mb-0" role="alert">
                <button class="btn-close float-end" onclick="location.href=location.href.split('&&')[0]"></button>
                <strong>สําเร็จ</strong> <?php echo $_GET['success']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-danger mb-0" role="alert">
                <button class="btn-close float-end" onclick="location.href=location.href.split('&&')[0]"></button>
                <strong>เกิดข้อผิดพลาด</strong> <?php echo $_GET['error']; ?>
            </div>
        <?php endif; ?>
        <div class="row py-3">
            <div class="col-lg-6 ">
                <center>
                    <img src="./app/uploads/<?= $product['image']; ?>" class="img-fluid rounded-3" alt="Responsive image">
                </center>
            </div>
            <div class="col-lg-6 d-flex align-items-center">
                <div class="row m-0" style="row-gap: 1rem;">
                    <div class="bg-light border p-3 rounded-3">
                        <h1><?= $product['name']; ?></h1>
                        <?php
                        $pointsync = new Point($product['id']);
                        echo $pointsync->getPoint();
                        ?>
                        <span class="badge bg-secondary rounded-pill ms-2"><?= $product['category']; ?></span>
                        <?php if ($product["status"] == 0) { ?>
                            <span class="badge bg-danger rounded-pill">ไม่พร้อมขาย</span>
                        <?php } else if ($product["status"] == 1) { ?>
                            <span class="badge bg-success rounded-pill">พร้อมขาย</span>
                        <?php } ?>
                        <p class="my-3"><?= $product['detail']; ?></p>
                        <h5>ราคา <?= $product['price']; ?> THB</h5>
                    </div>
                    <div>
                        <div class="row" style="row-gap: 1rem;">
                            <form action="/test-mode/app/server/set-point.php" method="post" class="col-12">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                    <div class="col-8 p-0">
                                        <select class="form-select" name="point" id="point" required>
                                            <option value="1" <?= $point == 1 ? 'selected' : ''; ?>>1</option>
                                            <option value="2" <?= $point == 2 ? 'selected' : ''; ?>>2</option>
                                            <option value="3" <?= $point == 3 ? 'selected' : ''; ?>>3</option>
                                            <option value="4" <?= $point == 4 ? 'selected' : ''; ?>>4</option>
                                            <option value="5" <?= $point == 5 ? 'selected' : ''; ?>>5</option>
                                        </select>
                                    </div>
                                    <div class="col-4 pe-0">
                                        <button type="submit" class="btn btn-warning text-nowrap w-100">ให้คะแนน</button>
                                    </div>
                                </div>
                            </form>
                            <form action="/test-mode/app/server/add-cart.php" method="post" class="col-12">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                    <div class="col-8 p-0">
                                        <input type="number" class="form-control w-100" name="quantity" id="quantity" value="1" min="1" required>
                                    </div>
                                    <div class="col-4 pe-0">
                                        <button type="submit" class="btn btn-success text-nowrap w-100">ใส่ในตะกร้า</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "./app/components/layout/footer.php" ?>
</body>

</html>