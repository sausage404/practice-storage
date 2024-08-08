<!DOCTYPE html>
<html lang="en">

<?php
require "./app/components/layout/head.php";
require "./config.php";
require "./app/lib/query.php";
$product = getProductById($_GET['id'])->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <?php require "./app/components/layout/navbar.php" ?>
    <div class="container" style="padding-top: <?= $_SESSION['user'] ? ($_SESSION['user']['role'] == 'admin' ? 8 : 0) : 7 ?>rem;min-height: 100vh;">
        <?php if (isset($_GET['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <button class="btn-close float-end" onclick="location.href=location.href.split('?')[0]"></button>
                <strong>สําเร็จ</strong> <?php echo $_GET['success']; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-danger" role="alert">
                <button class="btn-close float-end" onclick="location.href=location.href.split('?')[0]"></button>
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
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="col-4 pe-0">
                                        <button type="submit" class="btn btn-warning text-nowrap w-100">ให้คะแนน</button>
                                    </div>
                                </div>
                            </form>
                            <form action="" method="post" class="col-12">
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