<?php

use App\Models\User;

$customer =  User::WHERE([['status', '!=', '0'], ['roles', '=', '0']])->orderBy('created_at', 'desc')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=customer&cat=process" method="post" enctype="multipart/form-data">

   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả khách hàng</h1>
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
                     <!-- <a href="index.php?option=customer" class="btn btn-sm btn-primary">Tất cả</a> -->
                     <button class="btn btn-sm btn-danger" type="submit" name="DELETE_ALL">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Xóa nhiều
                     </button>
                     <a href="index.php?option=customer&cat=trash" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác</a>
                  </div>
                  <div div class="col-md-6 text-right">
                     <a href="index.php?option=customer&cat=create" class="btn btn-sm btn-success">Thêm Khách Hàng</a>
                  </div>
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
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($customer) > 0) : ?>
                        <?php foreach ($customer as $cus) : ?>
                           <tr class="datarow">
                              <td class="text-center">
                                 <input type="checkbox">
                              </td>
                              <td class="text-center">
                                 <img src="../public/images/user/<?= $cus->image; ?>" alt="hinhdaidien" style="width:70px; height:100px;">
                              </td>
                              <td class="text-center">
                                 <div class="name">
                                    <?= $cus->name; ?>
                                 </div>
                                 <div class="function_style">
                                    <?php if ($cus->status == 1) : ?>
                                       <a href="index.php?option=customer&cat=status&id=<?= $cus->id; ?>" class="btn 
                                       btn-success btn-xs">
                                          <i class="fas fa-toggle-on"></i> Hiện
                                       </a>
                                    <?php else : ?>
                                       <a href="index.php?option=customer&cat=status&id=<?= $cus->id; ?>" class="btn 
                                       btn-danger btn-xs">
                                          <i class="fas fa-toggle-off"></i> Ẩn
                                       </a>
                                    <?php endif; ?>
                                    <a href="index.php?option=customer&cat=edit&id=<?= $cus->id; ?>" class="btn btn-primary btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa
                                       <a href="index.php?option=customer&cat=show&id=<?= $cus->id; ?>" class="btn btn-info btn-xs">
                                          <i class="fas fa-eye"></i> Chi tiết
                                       </a>
                                       <a href="index.php?option=customer&cat=delete&id=<?= $cus->id; ?>" class="btn btn-danger btn-xs">
                                          <i class="fas fa-trash"></i> Xoá
                                       </a>
                                 </div>
                              </td>
                              <td><?= $cus->phone; ?></td>
                              <td><?= $cus->email; ?></td>
                              <td><?= $cus->created_at; ?></td>
                              <td><?= $cus->id; ?></td>
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