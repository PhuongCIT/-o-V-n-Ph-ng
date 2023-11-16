<?php

use App\Models\Order;

$list_order = Order::join('orderdetail', 'orderdetail.order_id', '=', 'order.id')
   ->join('user', 'user.id', '=', 'order.user_id')
   ->orderBy('order.created_at', 'desc')
   ->select('user.email', 'user.name as user_name', 'order.*')
   ->distinct()->get();
$list_status = [
   ['type' => 'secondary', 'text' => 'Đơn hàng mới'],
   ['type' => 'primary', 'text' => 'Đã xác nhận'],
   ['type' => 'info', 'text' => 'Đóng gói'],
   ['type' => 'warning', 'text' => 'Vận chuyển'],
   ['type' => 'danger', 'text' => 'Đã hủy'],
]

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline text-danger">Tất cả đơn hàng</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header p-2">
               <a href="index.php?option=menu&cat=delete" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i> Xóa</a>
            </div>
            <div class="card-body p-2">
            <?php require_once "../views/backend/message.php"; ?>
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th>Khách hàng</th>
                        <th>Điện Thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>ngày đặt</th>
                        <th>trạng thái</th>
                        <th>Chức năng</th>
                        <th>ID</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php if (count($list_order) > 0) : ?>
                        <?php foreach ($list_order as $item) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <div class="deliveryname">
                                 <?= $item->deliveryname; ?>
                              </div>
                              </td>
                              <td>
                                 <div class="deliveryphone">
                                    <?= $item->deliveryphone; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="deliveryemail">
                                    <?= $item->deliveryemail; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="deliveryaddress">
                                    <?= $item->deliveryaddress; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="created_at">
                                    <?= $item->created_at; ?>
                                 </div>
                              </td>
                              <td>
                                 <div class="status">
                                    <?php if ($item->status == 2) : ?>
                                       <div class="btn btn-sm btn-<?= $list_status['type']; ?>">
                                          <?= $list_status['text']; ?>
                                       </div>
                                    <?php endif; ?>
                                 </div>
                              </td>
                              <td>

                                 <a href="index.php?option=order&cat=show&id=<?= $item->id; ?>" class="btn btn-sm btn-info">
                                    <i class="far fa-eye"></i>
                                 </a>
                                 
                                 <a href="index.php?option=order&cat=delete&id=<?= $item->id; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                 </a>
                              </td>
                              <td>
                                 <div class="id">
                                    <?= $item->id; ?>
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