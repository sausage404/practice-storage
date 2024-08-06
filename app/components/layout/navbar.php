<div class="sticky-top w-100 z-3">
    <div class="bg-success text-center py-1 text-white">
        หากเกิดปัญหาในการใช้งาน กรุณาติดต่อ 081-999-9999 หรือ 0x9fL@example.com
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-md">
        <div class="container-xl">
            <a class="navbar-brand fw-bolder" href="/">หอมทรัพย์ อาหารสัตว์</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/" aria-current="page">หน้าหลัก
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
                    <input class="form-control me-sm-2" type="text" placeholder="Search" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    <button class="btn btn-success my-2 my-sm-0 ms-2 d-flex" type="submit">
                        <i class="bi bi-cart-fill"></i>
                    </button>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <button class="btn btn-success my-2 my-sm-0 ms-2" type="submit">
                            <i class="bi bi-person-fill"></i>
                        </button>
                    <?php } else { ?>
                        <a href="auth/login.php" class="btn btn-success my-2 my-sm-0 ms-2" type="submit">
                            <i class="bi bi-person-fill-lock"></i>
                        </a>
                        <a href="auth/register.php" class="btn btn-success my-2 my-sm-0 ms-2" type="submit">
                            <i class="bi bi-person-plus-fill"></i>
                        </a>
                    <?php } ?>
                </form>
            </div>
        </div>
    </nav>
</div>