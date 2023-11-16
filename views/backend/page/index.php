<?php

use App\Models\Post;

$list_page = Post::WHERE([['status', '!=', 0], ['type', '=', 'page']])
   ->orderBy('created_at', 'desc')
   ->get();
?>
<!-- CONTENT -->
<?php require_once "../views/backend/header.php"; ?>
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả trang đơn</h1>
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
                     <a href="index.php?option=page&cat=trash" class="btn btn-sm btn-danger"> Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right">
                     <a href="index.php?option=page&cat=create" class="btn btn-sm btn-success">Thêm trang đơn</a>
                  </div>
               </div>
            </div>
            <div class="card-body p-2">
            <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th class="text-center">Tiêu đề bài viết</th>
                        <th class="text-center">Slug</th>
                        <th class="text-center">Ngày tạo</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Chức năng</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list_page) > 0) : ?>
                        <?php foreach ($list_page as $lpage) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                                 <img class="img-fluid" src="../public/images/post/<?= $lpage->image; ?>" alt="<?= $lpage->image; ?>" style="width:70px; height:100px;">
                              </td>
                              <td>
                                 <div class="title">
                                    <?= $lpage->title; ?>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <div class="slug">
                                    <?= $lpage->slug; ?>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <div class="created_at">
                                    <?= $lpage->created_at; ?>
                                 </div>
                              </td>
                              <td class="text-center"><?= $lpage->id; ?></td>
                              <td class="text-center">
                                 <?php if ($lpage->status == 1) : ?>
                                    <a href="index.php?option=page&cat=status&id=<?= $lpage->id; ?>" class="btn btn-success btn-sm">
                                       <i class="fas fa-toggle-on"></i>
                                    </a>
                                 <?php else : ?>
                                    <a href="index.php?option=page&cat=status&id=<?= $lpage->id; ?>" class="btn 
                                       btn-danger btn-sm">
                                       <i class="fas fa-toggle-off"></i>
                                    </a>
                                 <?php endif; ?>
                                 <a href="index.php?option=page&cat=edit&id=<?= $lpage->id; ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                 </a>
                                 <a href="index.php?option=page&cat=show&id=<?= $lpage->id; ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                 </a>
                                 <a href="index.php?option=page&cat=delete&id=<?= $lpage->id; ?>" class="btn btn-danger btn-sm">
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
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>