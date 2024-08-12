<!DOCTYPE html>
<html lang="en">

<?php
require "./app/components/layout/head.php";
require "./config.php";
require "./app/lib/query.php";
require "./app/lib/point.php";
$products;

if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? LIMIT 10");
    $stmt->execute(['%' . $keyword . '%']);
    $products = $stmt->fetchAll();
} else if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE category = ? LIMIT 10");
    $stmt->execute([$category]);
    $products = $stmt->fetchAll();
} else {
    $products = getProducts()->fetchAll();
}

?>

<body>
    <?php require "./app/components/layout/navbar.php" ?>
    <div class="container" style="min-height: 100vh;">
        <div class="d-flex justify-content-center mb-3 pt-3">
            <div class="dropdown my-2 my-sm-0">
                <a class="btn btn-success btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-filter"></i> ตัวกรองหมวดหมู่
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/test-mode/product.php?category=อาหารสุนัข">อาหารสุนัข</a></li>
                    <li><a class="dropdown-item" href="/test-mode/product.php?category=อาหารแมว">อาหารแมว</a></li>
                    <li><a class="dropdown-item" href="/test-mode/product.php?category=อาหารนก">อาหารนก</a></li>
                    <li><a class="dropdown-item" href="/test-mode/product.php?category=อาหารปลา">อาหารปลา</a></li>
                </ul>
            </div>
        </div>
        <div class="row pb-3" style="row-gap: 1rem;">
            <?php if (!$products) { ?>
                <div>
                    <p class="text-center">ไม่พบสินค้าที่ค้นหา</p>
                </div>
            <?php }
            foreach ($products as $product) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3 ">
                    <?php require "./app/components/ui/card-product.php" ?>
                </div>
            <?php
            endforeach
            ?>
        </div>
    </div>
    <?php require "./app/components/layout/footer.php" ?>
</body>

</html>