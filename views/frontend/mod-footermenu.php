<?php

use App\Models\Menu;

$mod_footermenu = Menu::where([['position', '=', 'footermenu'], ['status', '=', 1]])->orderBy('sort_order', 'ASC')->get();
?>
<h3 class="widgettilte">
   <strong>CHÍNH SÁCH</strong>
</h3>
<ul class="footer-menu">
   <?php foreach ($mod_footermenu as $rowmenu) : ?>
      <li><a href="<?= $rowmenu->link; ?>" style="text-decoration:none;"><?= $rowmenu->name; ?></a></li>
   <?php endforeach; ?>

</ul>