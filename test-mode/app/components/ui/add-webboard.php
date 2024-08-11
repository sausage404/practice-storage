<div class="modal fade" id="add-webboard" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <form action="/test-mode/app/server/add-webboard.php" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modalTitleId">
                    เพิ่มเว็บบอร์ด
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" style="row-gap: 1rem;">
                    <div class="col-12">
                        <label for="title" class="form-label">หัวข้อ</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="col-12">
                        <label for="content" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-success">เพิ่มหัวข้อ</button>
            </div>
        </form>
    </div>
</div>