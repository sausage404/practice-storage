<!DOCTYPE html>
<html lang="en">

<?php
require "../app/components/layout/head.php";
require "../config.php";
?>

<body>
    <?php require "../app/components/layout/navbar.php" ?>
    <div class="container-fluid" style="min-height: 100vh">
        <div class="row justify-content-center pt-5 md-pt-0" style="min-height: 100vh;">
            <div class="col-md-6 p-3 container-sm d-flex align-items-center" style="max-width: 30rem;">
                <div class="pt-5 w-100">
                    <h2 class="text-center mb-4 fw-bold mt-3">เข้าสู่ระบบ</h2>
                    <form action="../app/server/login.php" method="post">
                        <?php if (isset($_GET['error'])) : ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>เกิดข้อผิดพลาด</strong> <?php echo $_GET['error']; ?>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">ที่อยู่อีเมล</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="nFt5Y@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <p class="">
                            หากยังไม่มีบัญชี <a href="/test-mode/auth/register.php" class="text-decoration-none">คลิกที่นี่</a>
                        </p>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <button onclick="history.back()" class="btn btn-outline-success w-100">ย้อนกลับ</button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-success w-100">เข้าสู่ระบบ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-none d-md-block col-md-6" style="background-image: url(https://ga-petfoodpartners.co.uk/content/uploads/2021/11/Pet-Food-Trends-Main-Banner.png);">
            </div>
        </div>
    </div>
    <?php require "../app/components/layout/footer.php" ?>
</body>

</html>