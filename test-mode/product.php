<!DOCTYPE html>
<html lang="en">

<?php
require "./app/components/layout/head.php";
require "./config.php";
require "./app/lib/query.php";
require "./app/lib/point.php"
?>

<body>
    <?php require "./app/components/layout/navbar.php" ?>
    <div class="container" style="padding-top: <?= $_SESSION['user'] ? ($_SESSION['user']['role'] == 'admin' ? 8 : 0) : 7 ?>rem;min-height: 100vh;">
        <div class="row py-3" style="row-gap: 1rem;">
            <?php foreach (getProducts()->fetchAll() as $product) : ?>
                <div class="col-sm-6 col-md-3">
                    <?php require "./app/components/ui/product-card.php" ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <?php require "./app/components/layout/footer.php" ?>
</body>

</html>