<style>
    .head::-webkit-scrollbar {
        display: none;
    }
</style>
<div class="modal fade" id="account" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-md" role="document">
        <form action="/test-mode/app/server/info.php" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalTitleId">
                    บัญชีของคุณ
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (isset($_GET['error'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>เกิดข้อผิดพลาด</strong> <?php echo $_GET['error']; ?>
                    </div>
                <?php endif; ?>
                <div style="display: grid;row-gap: .5rem;">
                    <div class="row">
                        <div class="col-md-6 mb">
                            <label for="name" class="form-label">ไอดี</label>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $_SESSION['user']['id'] ?>" readonly>
                        </div>
                        <div class="col-md-6 mb">
                            <label for="name" class="form-label">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= $_SESSION['user']['name'] ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['user']['email'] ?>" required>
                        </div>
                        <div class="col-md-6 mb">
                            <label for="role" class="form-label">สิทธิ์</label>
                            <input type="text" class="form-control" name="role" id="role" value="<?= $_SESSION['user']['role'] ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">บันทึก</button>
                <a href="/test-mode/app/server/logout.php" class="btn btn-danger">ออกจากระบบ</a>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="about" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalTitleId">
                    เกี่ยวกับเรา
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>หอมทรัพย์ อาหารสัตว์</p>
                <p>สร้างโดย นายสิริศักดิ์ วิทยานุสรณ์</p>
                <p>การแข่งขันศิลปะหัตถกรรม ครั้งที่ 72</p>
                Copyright 2022 Srisongrak Wittaya School All Rights Reserved
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="order" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered  modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalTitleId">
                    รายการสั่งซื้อ
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row m-0" style="row-gap: 1rem;">
                    <?php
                    if (getOrderByUserId($_SESSION['user']['id'])->rowCount() == 0)
                        echo '<p class="text-center m-0">ยังไม่มีรายการสั่งซื้อ</p>';
                    foreach (getOrderByUserId($_SESSION['user']['id']) as $order) {
                    ?>
                        <div
                            class="alert m-0 <?= -1 < $order['status'] && $order['status'] < 2 ? 'alert-primary' : ($order['status'] === 2 ? 'alert-success' : 'alert-danger') ?>"
                            role="alert">
                            <?php if ($order['status'] === -1 || $order['status'] === 2) { ?>
                                <a href="/test-mode/app/server/remove-order.php?id=<?= $order['id'] ?>" class="btn-close float-end"></a>
                            <?php } ?>
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
                            <p class="mt-1 mb-0">
                                <strong>สถานะ</strong>: <?= $order['message'] ?><br>
                                <strong>ที่อยู่</strong>: <?= $order['address'] ?><br>
                                <strong>ราคา</strong>: <?= number_format($total, 2) ?> บาท
                            </p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="position-fixed top-0 w-100 z-1">
    <div class="bg-success text-center py-1 px-2 text-white overflow-auto text-nowrap head">
        หากเกิดปัญหาในการใช้งาน กรุณาติดต่อ 081-999-9999 หรือ 0x9fL@example.com
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-md">
        <div class="container-xl">
            <a class="navbar-brand fw-bolder" href="/test-mode/">หอมทรัพย์ อาหารสัตว์</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/test-mode/" aria-current="page">หน้าหลัก
                            <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/test-mode/product.php">รายการสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/test-mode/webboard.php">เว็บบอร์ด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#about">เกี่ยวกับเรา</a>
                    </li>
                </ul>
                <form action="/test-mode/product.php" method="get" class="d-flex my-2 my-lg-0">
                    <input class="form-control my-sm-0 my-2" name="search" type="search" autocomplete="off" placeholder="Search" />
                    <a href="/test-mode/cart.php" class="btn btn-success my-2 my-sm-0 ms-2 d-flex" type="submit">
                        <i class="bi bi-cart-fill"></i>
                    </a>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <button data-bs-toggle="modal" data-bs-target="#account" class="btn btn-success my-2 my-sm-0 ms-2" type="button">
                            <i class="bi bi-person-fill"></i>
                        </button>
                        <button data-bs-toggle="modal" data-bs-target="#order" class="btn btn-success my-2 my-sm-0 ms-2" type="button">
                            <i class="bi bi-bell-fill"></i>
                        </button>
                        <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                            <div class="dropdown my-2 my-sm-0 ms-2">
                                <a class="btn btn-success" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-tools"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <a href="/test-mode/admin/order.php" class="dropdown-item">
                                        จัดการออเดอร์ (Order)
                                    </a>
                                    <a href="/test-mode/admin/product.php" class="dropdown-item">
                                        จัดการสินค้า (Product)
                                    </a>
                                    <a href="/test-mode/admin/webboard.php" class="dropdown-item">
                                        จัดการเว็บบอร์ด (Webboard)
                                    </a>
                                    <a href="/test-mode/admin/user.php" class="dropdown-item">
                                        จัดการผู้ใช้งาน (User)
                                    </a>
                                </ul>
                            </div>
                        <?php }
                    } else { ?>
                        <a href="/test-mode/auth/login.php" class="btn btn-success my-2 my-sm-0 ms-2" type="button">
                            <i class="bi bi-person-fill-lock"></i>
                        </a>
                        <a href="/test-mode/auth/register.php" class="btn btn-success my-2 my-sm-0 ms-2" type="button">
                            <i class="bi bi-person-plus-fill"></i>
                        </a>
                    <?php } ?>
                </form>
            </div>
        </div>
    </nav>
</div>