<?php

use App\Libraries\MyClass;

if (MyClass::has_flash('message')) : ?>
    <?php $arr = MyClass::get_flash('message'); ?>
    <div class="alert alert-<?= $arr['type']; ?>">
        <?= $arr['msg']; ?>
    </div>
<?php endif; ?>