<?php

use App\Models\Topic;

$list = Topic::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();

?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=topic&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả chủ đề</h1>
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
                     <a href="index.php?option=topic" class="btn btn-sm btn-info">Tất cả</a>
                     <a href="index.php?option=topic&cat=trash" class="btn btn-sm btn-danger"> Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right">
                     <a href="index.php?option=topic&cat=create" class="btn btn-sm btn-primary">Thêm chủ đề</a>
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
                              <th>Tên chủ đề</th>
                              <th>Tên slug</th>
                              <th>Ngày tạo</th>
                              <th>ID</th>
                              <th>Chức năng</th>
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
                                       <div class="name">
                                          <?= $item['name']; ?>
                                       </div>
                                    </td>
                                    <td class="text-center"><?= $item['slug'] ?></td>
                                    <td class="text-center"><?= $item->created_at ?></td>
                                    <td class="text-center"><?= $item->id; ?></td>
                                    <td class="text-center">
                                       <?php if ($item->status == 2) : ?>
                                          <a href="index.php?option=topic&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                             <i class="fas fa-toggle-off"></i>
                                          </a>
                                       <?php else : ?>
                                          <a href="index.php?option=topic&cat=status&id=<?= $item->id; ?>" class="btn btn-sm btn-success">
                                             <i class="fas fa-toggle-on"></i>
                                          </a>
                                       <?php endif; ?>
                                       <a href="index.php?option=topic&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                          <i class="far fa-eye"></i>
                                       </a>
                                       <a href="index.php?option=topic&cat=edit&id=<?= $item->id; ?>" class="btn btn-sm btn-primary">
                                          <i class="far fa-edit"></i>
                                       </a>
                                       <a href="index.php?option=topic&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
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