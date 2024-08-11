<div class="modal fade" id="reply-webboard<?= $webboard['id'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <form action="/test-mode/app/server/reply-webboard.php" method="post" class="modal-content">
            <div class="modal-header">
                <div>
                    <p class="p-0 mb-2 fw-bold h5"><?= $webboard['title'] ?></p>
                    <p class="p-0 mb-0">โพสต์เมื่อ <?= $webboard['create_at'] ?></p>
                </div>
                <button type="button" class="btn-close" data-bs-target="#read-webboard<?= $webboard['id'] ?>" data-bs-toggle="modal"></button>
            </div>
            <div class="modal-body">
                <?php
                if (getRepliesByWebboardId($webboard['id'])->rowCount() == 0) {
                    echo "<p class='m-0'>ยังไม่มีการตอบกลับ</p>";
                }
                foreach (getRepliesByWebboardId($webboard['id'])->fetchAll() as $reply) {
                    $user = getUserById($reply['user_id'])->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="alert m-0" role="alert">
                        <p class="m-0">
                            <strong>ผู้ตอบ</strong>: <?= $user['name'] ?><br>
                            <strong>รายละเอียด</strong>: <?= $reply['content'] ?><br>
                            <strong>เมื่อ</strong>: <?= $reply['create_at'] ?>
                            <?php if (!isset($_SESSION['user'])) { ?>
                            <?php } else if ($_SESSION['user']['id'] == $webboard['user_id'] || $_SESSION['user']['role'] == 'admin') { ?>
                                <small class="float-end">
                                    <a class="text-danger" href="/test-mode/app/server/remove-reply.php?id=<?= $reply['id'] ?>">ลบ</a>
                                </small>
                            <?php } ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" value="<?= $webboard['id'] ?>">
                <div class="d-flex w-100" style="column-gap: 1rem;">
                    <div class="w-100">
                        <input type="text" class="form-control w-100" name="content" id="content" required>
                    </div>
                    <div class="w-auto text-nowrap">
                        <button type="submit" class="btn btn-success">การตอบกลับ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>