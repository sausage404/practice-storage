<?php
session_start();
$BASE_URL = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/bootstrap/bootstrap-icons@1.10.5.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/style.css">
    <title>Document</title>
</head>

<body>

    <?php
    require "./components/layout/navbar.php";
    require "./routes.php";
    require "./components/layout/footer.php";
    ?>

</body>

<script src="assets/bootstrap/bootstrap.bundle.min.js"></script>

</html>