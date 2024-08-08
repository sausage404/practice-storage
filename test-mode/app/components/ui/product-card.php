<div class="card">
    <img class="card-img-top" src="./app/uploads/<?= $product['image']; ?>" alt="Title" />
    <div class="card-body">
        <h4 class="card-title fw-bold"><?= $product['name']; ?></h4>
        <?php
        $point = new Point($product['id']);
        echo $point->getPoint();
        ?>
        <span class="badge bg-secondary rounded-pill "><?= $product['category']; ?></span>
        <?php if ($product["status"] == 0) { ?>
            <span class="badge bg-danger rounded-pill">ไม่พร้อมขาย</span>
        <?php } else if ($product["status"] == 1) { ?>
            <span class="badge bg-success rounded-pill">พร้อมขาย</span>
        <?php } ?>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <p class="card-title">ราคา <?= $product['price']; ?> THB</p>
        <a href="/test-mode/detail.php?id=<?= $product['id']; ?>" class="btn btn-sm btn-success">ดูรายละเอียด</a>
    </div>
</div>