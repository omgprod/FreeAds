<?php if(isset($flash)): ?>
<div class="d-flex justify-content-center">
    <div class="alert alert-<?= $flash["type"] ?>" role="alert">
        <?= $flash["message"] ?>
    </div>
</div>
<?php endif; ?>
