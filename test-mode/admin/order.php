<!DOCTYPE html>
<html lang="en">

<?php
require "../app/components/layout/head.php";
require "../config.php";
?>

<body>
    <?php require "../app/components/layout/navbar.php" ?>
    <div class="container-lg" style="min-height: 100vh;">
        <div class="row" style="padding-top: 7rem;row-gap: 1rem;">
            <div class="col-lg-3">
                <?php require "../app/components/layout/sidebar.php" ?>
            </div>
            <div class="col-lg-9">
            </div>
        </div>
    </div>
    <?php require "../app/components/layout/footer.php" ?>
</body>

</html>