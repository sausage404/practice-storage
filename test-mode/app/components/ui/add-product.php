<div class="modal fade" id="add-product" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <form action="/test-mode/app/server/add-product.php" method="post" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalTitleId">
                    เพิ่มสินค้า
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" style="row-gap: 1rem;">
                    <div class="col-md-6">
                        <label for="name" class="form-label">ชื่อสินค้า</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">ราคา</label>
                        <input type="number" class="form-control" name="price" id="price" required>
                    </div>
                    <div class="col-md-6">
                        <label for="category" class="form-label">หมวดหมู่</label>
                        <select class="form-select" name="category" id="category" required>
                            <option value="อาหารแมว">อาหารแมว</option>
                            <option value="อาหารสุนัข">อาหารสุนัข</option>
                            <option value="อาหารนก">อาหารนก</option>
                            <option value="อาหารปลา">อาหารปลา</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">สถานะ</label>
                        <select class="form-select" name="status" id="status" required>
                            <option value="1">พร้อมขาย</option>
                            <option value="0">ไม่พร้อมขาย</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="image" class="form-label">รูปภาพ</label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>
                    <div class="col-md-12">
                        <label for="detail" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" name="detail" id="detail" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
        </form>
    </div>
</div>