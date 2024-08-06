<style>
    .bg-image {
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url(https://storage.googleapis.com/techsauce-prod/uploads/2017/02/DOG-FOOD-1140x600.jpg);
        height: 85.3vh;
    }

    .bg-image::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100vh;
        inset: 0;
        background-color: rgba(255, 255, 255, 0.425);
        backdrop-filter: blur(10px);
    }

    .btn-main {
        background-color: rgba(255, 255, 255, 0.225);
        border: none;
        border-radius: 1rem;
        padding: 0 1rem;
    }
</style>
<div class="bg-image">
    <div class="d-flex justify-content-center align-items-center h-100 position-relative" style="z-index: 1;">
        <div class="text-center p-3" style="display:grid;grid-gap: 1rem;max-width: 40rem;">
            <h1 class="text-center fw-bold">หอมทรัพย์ อาหารสัตว์</h1>
            <h5 style="line-height: 2rem;">เว็บไซต์ที่ดีที่สุดสำหรับการซื้ออาหารสัตว์ออนไลน์! ที่นี่คุณจะพบกับผลิตภัณฑ์อาหารสัตว์หลากหลายประเภทสำหรับสัตว์เลี้ยงทุกชนิด ไม่ว่าจะเป็นสุนัข แมว ปลา นก หรือสัตว์เลี้ยงอื่นๆ เรามีทุกอย่างที่คุณต้องการ</h5>
            <div class="d-flex flex-wrap justify-content-center" style="gap: 1rem;">
                <button class="btn-main">อาหารสุนัข</button>
                <button class="btn-main">อาหารแมว</button>
                <button class="btn-main">อาหารปลา</button>
            </div>
        </div>
    </div>
</div>