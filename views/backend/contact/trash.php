<?php
use App\Models\Contact;
$contact = Contact::where('status', '=', 0)->orderBy('created_at', 'DESC')->get();
?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">THÙNG RÁC LIÊN HỆ</h1>
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
                  <a href="index.php?option=contact" class="btn btn-sm btn-primary">Tất cả</a>
               </div>
               <div class="col-md-6 text-right">
                  <a href="index.php?option=contact" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách liên hệ
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
                        <th class="text-center">Họ và tên</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Điện thoại</th>
                        <th class="text-center">Tiêu đề</th>
                        <th class="text-center">Ngày tạo</th>
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
                              <div class="title">
                                    <?= $con->title; ?>
                                 </div>
                              </td>
                              <td>
                              <div class="creatd_at">
                                    <?= $con->creatd_at; ?>
                                 </div>
                              </td>
                              <td>
                              <td>
                                 <a href="index.php?option=post&cat=restore&id=<?= $con->id; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-undo"></i>
                                 </a>
                                 <a href="index.php?option=post&cat=show&id=<?= $con->id; ?>" class="btn btn-sm btn-primary">
                                    <i class="far fa-eye"></i>
                                 </a>
                                 <a href="index.php?option=post&cat=destroy&id=<?= $con->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                              </td>
                              <td>
                              <div class="id">
                                    <?= $con->id; ?>
                                 </div>v
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