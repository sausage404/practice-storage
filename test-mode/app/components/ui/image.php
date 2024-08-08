<div class="modal fade" id="image<?= $product['id']; ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    <?= $product['name']; ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="../app/uploads/<?= $product['image']; ?>" class="img-fluid" alt="Responsive image">
                </center>
            </div>
        </div>
    </div>
</div>