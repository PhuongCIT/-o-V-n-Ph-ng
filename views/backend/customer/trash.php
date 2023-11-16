<?php

use App\Models\User;

$customer = User::where([['status', '=', 0], ['roles', '=', 0]])->orderBy('created_at', 'DESC')->get();

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
                  <a href="index.php?option=customer" class="btn btn-sm btn-primary">Tất cả</a>
               </div>
               <div class="col-md-6 text-right">
                  <a href="index.php?option=customer" class="btn btn-sm btn-info">
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
                        <th class="text-center" style="width:100px;">Hình ảnh</th>
                        <th style="width: 90px;">Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($customer) > 0) : ?>
                        <?php foreach ($customer as $cus) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                                 <img class="img-fluid" src="../public/images/user/<?= $cus->image; ?>" alt="<?= $cus->image; ?>">
                              </td>
                              <td>
                                 <div class="name">
                                    <?= $cus->name; ?>
                                 </div>
                                 <div class="function_style">
                                    <a href="index.php?option=customer&cat=restore&id=<?= $cus->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-undo"></i> Khôi Phục
                                    </a>
                                    <a href="index.php?option=customer&cat=destroy&id=<?= $cus->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xóa VV
                                    </a>
                                 </div>
                              </td>
                              <td>
                                 <div class="phone">
                                    <?= $cus->phone; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="email">
                                    <?= $cus->email; ?>
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