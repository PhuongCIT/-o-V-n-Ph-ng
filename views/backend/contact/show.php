<?php

use App\Models\Contact;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$contact =  Contact::find($id);
if ($contact == null) {
   MyClass::set_flash('message', ['msg' => 'Mẫu tin không tồn tại', 'type' => 'danger']);
   header("location:index.php?option=contact");
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
                  <a href="index.php?option=contact" class="btn btn-sm btn-info">
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
                        <td><?= $contact->id; ?></td>
                     </tr>
                     <tr>
                        <td>name</td>
                        <td><?= $contact->name; ?></td>
                     </tr>
                     <tr>
                        <td>email</td>
                        <td><?= $contact->email; ?></td>
                     </tr>
                     <tr>
                        <td>phone</td>
                        <td><?= $contact->phone; ?></td>
                     </tr>
                     <tr>
                        <td>username</td>
                        <td><?= $contact->username; ?></td>
                     </tr>
                     <tr>
                        <td>Tiêu đề</td>
                        <td><?= $contact->title; ?></td>
                     </tr>
                     <tr>
                        <td>nội dung</td>
                        <td><?= $contact->content; ?></td>
                     </tr>
                     <tr>
                        <td>Trả lời</td>
                        <td><?= $contact->replay; ?></td>
                     </tr>
                     <tr>
                        <td>created_at</td>
                        <td><?= $contact->created_at; ?></td>
                     </tr>
                     <tr>
                        <td>updated_at</td>
                        <td><?= $contact->updated_at; ?></td>
                     </tr>
                     <tr>
                        <td>updated_by</td>
                        <td><?= $contact->updated_by; ?></td>
                     </tr>
                     <tr>
                        <td>status</td>
                        <td><?= $contact->status; ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
   </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>