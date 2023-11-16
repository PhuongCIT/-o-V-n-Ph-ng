<?php

use App\Models\Menu;


$id = $_REQUEST['id'];
$menu =  Menu::find($id);
if ($menu == null) {
   header("location:index.php?option=menu");
}

?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Chi tiết </h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header">
            <div class="row">

               Noi dung
               <div class="col-md-11 text-right">
                  <a href="index.php?option=menu" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách khách hàng
                  </a>
               </div>
            </div>
            <div class="card-body">
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>

                        <th>Tên trường</th>
                        <th>Giá trị</th>

                     </tr>
                  </thead>
                  <tbody>

                     <tr>
                        <td>ID</td>
                        <td><?= $menu->id; ?></td>
                     </tr>
                     <tr>
                        <td>Tên menu</td>
                        <td><?= $menu->name; ?></td>
                     </tr>
                     <tr>
                        <td>liên kết</td>
                        <td><?= $menu->link; ?></td>
                     </tr>
                     <tr>
                        <td>kiểu</td>
                        <td><?= $menu->type; ?></td>
                     </tr>
                     <tr>
                        <td>Table Id</td>
                        <td><?= $menu->table_id; ?></td>
                     </tr>
                     <tr>
                        <td>Vị trí</td>
                        <td><?= $menu->position; ?></td>
                     </tr>
                     <tr>
                        <td>Mức</td>
                        <td><?= $menu->level; ?></td>
                     </tr>
                     <tr>
                        <td>Mã cấp cha</td>
                        <td><?= $menu->parent_id; ?></td>
                     </tr>
                     <tr>
                        <td>Ngày tạo</td>
                        <td><?= $menu->created_at; ?></td>
                     </tr>
                     <tr>
                        <td>người tạo</td>
                        <td><?= $menu->created_by; ?></td>
                     </tr>
                     <tr>
                        <td>người cập nhật</td>
                        <td><?= $menu->updated_at; ?></td>
                     </tr>
                     <tr>
                        <td>ngày cập nhật</td>
                        <td><?= $menu->updated_by; ?></td>
                     </tr>
                     <tr>
                        <td>status</td>
                        <td><?= $menu->status; ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
   </section>
</div>

<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>