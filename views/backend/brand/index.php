<?php

use App\Models\Brand;

$list = Brand::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->

<form action="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả thương hiệu</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->=
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=brand" class="btn btn-sm btn-primary">Tất cả</a>
                     <a href="index.php?option=brand&cat=trash" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
                  </div>
                  <div div class="col-md-6 text-right">
                     <a href="index.php?option=brand&cat=create" class="btn btn-sm btn-success">Thêm Thương Hiệu</a>
                  </div>
               </div>

            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
               <div class="col-md">
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th class="text-center">Tên thương hiệu</th>
                           <th class="text-center">Tên slug</th>
                           <th class="text-center">ID</th>
                           <th class="text-center">Chức năng</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (count($list) > 0) : ?>
                           <?php foreach ($list as $item) : ?>
                              <tr class="datarow">
                                 <td class="text-center">
                                    <input type="checkbox">
                                 </td>
                                 <td class="text-center">
                                    <img class="img-fluid" src="../public/images/brand/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                 </td>
                                 <td class="text-center">
                                    <div class="name">
                                       <?= $item->name; ?>
                                    </div>
                                 </td>
                                 <td class="text-center">
                                    <div class="slug">
                                       <?= $item->slug; ?>
                                    </div>
                                 </td>
                                 <td class="text-center">
                                    <div class="id">
                                       <?= $item->id; ?>
                                    </div>
                                 </td>
                                 <td>
                                    <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=brand&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-success btn-xs">
                                          <i class="fas fa-toggle-on"></i> Hiện
                                       </a>
                                    <?php else : ?>
                                       <a href="index.php?option=brand&cat=status&id=<?= $item->id; ?>" class="btn 
                                       btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i> Ẩn
                                       </a>
                                    <?php endif; ?>
                                    <a href="index.php?option=brand&cat=edit&id=<?= $item->id; ?>" class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa

                                    </a>
                                    <a href="index.php?option=brand&cat=show&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết
                                    </a>
                                    <a href="index.php?option=brand&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
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
         </div>
   </div>
   </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>