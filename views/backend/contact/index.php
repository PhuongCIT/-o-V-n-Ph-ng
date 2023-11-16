<?php

use App\Models\Contact;

$contact = Contact::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=contact&cat=process" method="contact" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả liên hệ</h1>
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
                     <a href="index.php?option=contact&cat=delete" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                     </a>
                  </div>
                  <div class="col-md-6 text-right">
                     <a href="index.php?option=contact&cat=trash" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Thùng rác
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:25px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center">Họ và tên</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Điện thoại</th>
                        <th class="text-center">Ngày tạo</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Chức năng</th>
                        <th class="text-center">ID</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($contact) > 0) : ?>
                        <?php foreach ($contact as $con) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                                 <div class="name">
                                    <?= $con->name; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="phone">
                                    <?= $con->phone; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="email">
                                    <?= $con->email; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="creatd_at">
                                    <?= $con->creatd_at; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="status">
                                    <?= $con->status; ?>
                                 </div>
                              </td>
                              <td>
                              <td>
                                 <a href="index.php?option=contact&cat=edit&id=<?= $con->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                 </a>
                                 <a href="index.php?option=contact&cat=show&id=<?= $con->id; ?>" class="btn btn-sm btn-primary">
                                    <i class="far fa-eye"></i>
                                 </a>
                                 <a href="index.php?option=contact&cat=delete&id=<?= $con->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                              </td>
                              <td>
                                 <div class="id">
                                    <?= $con->id; ?>
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
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>