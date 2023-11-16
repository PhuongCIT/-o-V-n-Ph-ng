<?php

use App\Libraries\MyClass;
use App\Models\Banner;

$list = Banner::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">
   <!-- CONTENT -->
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả banner</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=banner" class="btn btn-info">Tất cả</a>
                     <a href="index.php?option=banner&cat=trash" class="btn btn-danger"> Thùng rác</a>
                  </div>
                  <div class="col-sm-6 text-right">
                     <a href="index.php?option=banner&cat=create" class="btn btn-sm btn-success">Thêm banner</a>
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
                           <th class="text-center">Tên banner</th>
                           <th class="text-center">Liên kết</th>
                           <th class="text-center">Ngày tạo</th>
                           <th class="text-center">ID</th>
                           <th class="text-center">Chức năng</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (count($list) > 0) : ?>
                           <?php foreach ($list as $item) : ?>
                              <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>

                                 <td>
                                    <div class="name">
                                       <?= $item->name; ?>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="link">
                                       <?= $item->link; ?>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="created_at">
                                       <?= $item->created_at; ?>
                                    </div>
                                 </td>
                                 <td class="id"> <?= $item->id; ?> </td>
                                 <td class="text-center">
                                    <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=banner&cat=status&id=<?= $item->id; ?>" class="btn btn-success btn-xs">
                                          <i class="fas fa-toggle-on"></i> Hiện
                                       </a>
                                    <?php else : ?>
                                       <a href="index.php?option=banner&cat=status&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i> Ẩn
                                       </a>
                                    <?php endif; ?>
                                    <a href="index.php?option=banner&cat=edit&id=<?= $item->id; ?>" class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> sửa
                                    </a>
                                    <a href="index.php?option=banner&cat=show&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết
                                    </a>
                                    <a href="index.php?option=banner&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá
                                    </a>
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
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>