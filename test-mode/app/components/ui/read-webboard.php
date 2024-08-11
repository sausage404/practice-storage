<div class="modal fade" id="read-webboard<?= $webboard['id'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <p class="p-0 mb-2 fw-bold h5"><?= $webboard['title'] ?></p>
                    <p class="p-0 mb-0">โพสต์เมื่อ <?= $webboard['create_at'] ?></p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="m-0"><?= $webboard['content'] ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-target="#reply-webboard<?= $webboard['id'] ?>" data-bs-toggle="modal" class="btn btn-success">การตอบกลับ</button>
            </div>
            </form>
        </div>
    </div>
</div>