<!DOCTYPE html>
<html lang="en">

<?php
require "./app/components/layout/head.php";
require "./config.php";
require "./app/lib/query.php";
?>

<body>
    <?php require "./app/components/layout/navbar.php" ?>
    <style>
        .bg-image {
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url(/test-mode/app/assets/index.png);
            height: 85.5vh;
            width: 100%;
        }

        .bg-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
            background-color: rgba(255, 255, 255, 0.4);
        }

        .btn-main {
            border: none;
            border-radius: 1rem;
            padding: 0 1rem;
            background-color: #f8f9fa;
            color: #212529;
            text-decoration: none;
        }
    </style>
    <div class="bg-image">
        <div class="d-flex justify-content-center align-items-center h-100 position-relative">
            <div class="text-center p-3 rounded-5" style="display:grid;grid-gap: 1rem;max-width: 40rem;">
                <h1 class="text-center fw-bold">หอมทรัพย์ อาหารสัตว์</h1>
                <h5 style="line-height: 2rem;">เว็บไซต์ที่ดีที่สุดสำหรับการซื้ออาหารสัตว์ออนไลน์! ที่นี่คุณจะพบกับผลิตภัณฑ์อาหารสัตว์หลากหลายประเภทสำหรับสัตว์เลี้ยงทุกชนิด ไม่ว่าจะเป็นสุนัข แมว ปลา นก หรือสัตว์เลี้ยงอื่นๆ เรามีทุกอย่างที่คุณต้องการ</h5>
                <div class="d-flex flex-wrap justify-content-center" style="gap: 1rem;">
                    <a href="/test-mode/product.php?category=อาหารสุนัข" class="btn-main">อาหารสุนัข</a>
                    <a href="/test-mode/product.php?category=อาหารแมว" class="btn-main">อาหารแมว</a>
                    <a href="/test-mode/product.php?category=อาหารปลา" class="btn-main">อาหารปลา</a>
                </div>
            </div>
        </div>
    </div>
    <?php require "./app/components/layout/footer.php" ?>
</body>

</html>