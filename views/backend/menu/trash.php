<?php

use App\Models\Menu;

$list = Menu::where('status', '=', 0)
   ->orderBy('created_at', 'desc')
   ->get();
?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Thùng rác khách hàng</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <a href="index.php?option=menu" class="btn btn-sm btn-primary">Tất cả</a>
               </div>
               <div class="col-md-6 text-right">
                  <a href="index.php?option=menu" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách khách hàng
                  </a>
               </div>
            </div>
            <div class="card-body">
            <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center">Tên menu</th>
                        <th class="text-center">liên kết</th>
                        <th class="text-center">Vị trí</th>
                        <th class="text-center">Ngày tạo</th>
                        <th class="text-center">chức năng</th>
                        <th class="text-center">ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $menu) : ?>
                           <tr class="datarow">
                              <td class="text-center">
                                 <input type="checkbox">
                              </td>

                              <td class="text-center">
                                 <div class="name">
                                    <?= $menu->name; ?>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <div class="link">
                                    <?= $menu->link; ?>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <div class="position">
                                    <?= $menu->position; ?>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <div class="created_at">
                                    <?= $menu->creatd_at; ?>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <a href="index.php?option=menu&cat=restore&id=<?= $menu->id; ?>" class="btn btn-info btn-xs">
                                    <i class="fas fa-undo"></i> Khôi Phục
                                 </a>
                                 <a href="index.php?option=menu&cat=destroy&id=<?= $menu->id; ?>" class="btn btn-danger btn-xs">
                                    <i class="fas fa-trash"></i> Xóa VV
                                 </a>
                              </td>
                              <td class="text-center">
                                 <div class="id">
                                    <?= $menu->id; ?>
                                 </div>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
   </section>
</div>

<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>