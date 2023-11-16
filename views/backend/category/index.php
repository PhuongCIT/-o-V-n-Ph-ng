<?php

use App\Models\Category;


$list = category::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();

?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=category&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <strong class="text-dark text-lg">TẤT CẢ DANH MỤC</strong>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header ">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=category&cat=trash" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right">
                     <a href="index.php?option=category&cat=create" class="btn btn-success btn-sm"> Thêm danh muc</a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
               <div class="row">
                  <div class="col-md">
                     <table class="table table-bordered" id="mytable">
                        <thead>
                           <tr>
                              <th class="text-center" style="width:30px;">
                                 <input type="checkbox">
                              </th>
                              <th class="text-center" style="width:130px;">Hình ảnh</th>
                              <th class="text-center">Tên danh mục</th>
                              <th class="text-center">Tên slug</th>
                              <th class="text-center" style="width:30px">ID</th>
                              <th class="text-center" style="width:170px">Chức năng</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (count($list) > 0) : ?>
                              <?php foreach ($list as $item) : ?>
                                 <tr>
                                    <td class="text-center">
                                       <input type="checkbox" />
                                    </td>
                                    <td class="text-center">
                                       <img src="../public/images/category/<?= $item->image; ?>" class="img-fluid" alt="hinh" style="width:70px; height:100px;">
                                    </td>
                                    <td class="text-center">
                                       <?= $item->name; ?>
                                    </td>
                                    <td class="text-center"> <?= $item->slug; ?></td>
                                    <td class="text-center"><?= $item->id; ?></td>
                                    <td class="text-center">
                                       <?php if ($item->status == 2) : ?>
                                          <a href="index.php?option=category&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                             <i class="fas fa-toggle-off"></i>
                                          </a>
                                       <?php else : ?>
                                          <a href="index.php?option=category&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                             <i class="fas fa-toggle-on"></i>
                                          </a>
                                       <?php endif; ?>
                                       <a href="index.php?option=category&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                          <i class="far fa-eye"></i>
                                       </a>
                                       <a href="index.php?option=category&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                          <i class="far fa-edit"></i>
                                       </a>
                                       <a href="index.php?option=category&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                          <i class="fas fa-trash"></i>
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