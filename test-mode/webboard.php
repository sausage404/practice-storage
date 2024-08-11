<!DOCTYPE html>
<html lang="en">

<?php
require "./app/components/layout/head.php";
require "./config.php";
require "./app/lib/query.php";
?>

<body>
    <?php
    require "./app/components/layout/navbar.php";
    require "./app/components/ui/add-webboard.php";
    ?>
    <div class="container" style="padding-top: 7rem;min-height: 100vh;">
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
        <div class="row" style="row-gap: 1rem;">
            <div class="col-12">
                <div class="bg-success p-3 rounded-3">
                    <p style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#add-webboard" class="float-end text-light m-0">
                        <i class="bi bi-plus-lg"></i> เพิ่มหัวข้อ
                    </p>
                    <p class="text-light fw-bold m-0">หัวข้อเว็บบอร์ด</p>
                </div>
            </div>
            <?php
            foreach (getWebboards() as $webboard) {
                $user = getUserById($webboard['user_id'])->fetch(PDO::FETCH_ASSOC);
                require "./app/components/ui/read-webboard.php";
                require "./app/components/ui/reply-weboard.php";
            ?>
                <div class="col-12">
                    <div style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#read-webboard<?= $webboard['id'] ?>" class="d-block text-decoration-none bg-light p-3 rounded-3">
                        <div>
                            <p class="text-decoration-none text-dark fw-bold"><?= $webboard['title'] ?> - <?= $user['name'] ?></p>
                            <p class="text-secondary m-0">โพสต์เมื่อ <?= $webboard['create_at'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php require "./app/components/layout/footer.php" ?>
</body>

</html>