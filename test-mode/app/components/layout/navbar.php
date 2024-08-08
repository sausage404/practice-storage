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
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">ไอดี</label>
                        <input type="text" class="form-control" name="id" id="id" value="<?= $_SESSION['user']['id'] ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?= $_SESSION['user']['username'] ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">อีเมล</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['user']['email'] ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="role" class="form-label">สิทธิ์</label>
                        <input type="text" class="form-control" name="role" id="role" value="<?= $_SESSION['user']['role'] ?>" readonly>
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
<div class="position-fixed top-0 w-100 z-3">
    <div class="bg-success text-center py-1 px-2 text-white overflow-auto text-nowrap head">
        หากเกิดปัญหาในการใช้งาน กรุณาติดต่อ 081-999-9999 หรือ 0x9fL@example.com
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-md">
        <div class="container-xl">
            <a class="navbar-brand fw-bolder" href="/test-mode/index.php">หอมทรัพย์ อาหารสัตว์</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/test-mode/index.php" aria-current="page">หน้าหลัก
                            <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">รายการสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">เว็บบอร์ด</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">เกี่ยวกับเรา</a>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-2 my-sm-0 my-2" type="text" placeholder="Search" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    <button class="btn btn-success my-2 my-sm-0 ms-2 d-flex" type="submit">
                        <i class="bi bi-cart-fill"></i>
                    </button>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <button data-bs-toggle="modal" data-bs-target="#account" class="btn btn-success my-2 my-sm-0 ms-2" type="button">
                            <i class="bi bi-person-fill"></i>
                        </button>
                        <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                            <a href="/test-mode/admin/index.php" class="btn btn-success my-2 my-sm-0 ms-2" type="button">
                                <i class="bi bi-tools"></i>
                            </a>
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