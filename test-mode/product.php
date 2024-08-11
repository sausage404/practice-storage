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
    <div class="container" style="padding-top: <?= isset($_SESSION['user']) ? ($_SESSION['user']['role'] == 'admin' ? 9 : 7) : 7 ?>rem;min-height: 100vh;">
        <div class="row pb-3" style="row-gap: 1rem;">
            <?php if (!$products) { ?>
                <div class="row">
                    <div class="text-center">ไม่พบสินค้าที่ค้นหา</div>
                </div>
            <?php }
            foreach ($products as $product) : ?>
                <div class="col-sm-6 col-md-3">
                    <?php require "./app/components/ui/product-card.php" ?>
                </div>
            <?php
            endforeach
            ?>
        </div>
    </div>
    <?php require "./app/components/layout/footer.php" ?>
</body>

</html>