<?php
use App\Models\Contact;
$id=$_REQUEST['id'];
$contact = Contact::where('status','!=',0)->get();
if($contact==null){
   header("location:index.php?option=contact");
}
?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">TRẢ LỜI LIÊN HỆ</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=contact" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button class="btn btn-sm btn-success" type="submit" name="TRALOI">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Trả Lời
               </button>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="mb-3">
                              <label>Họ và Tên</label>
                              <input type="text" name="name" value="<?=$contact->name;?>" class="form-control">
                           </div>
                           <div class="mb-3">
                              <label>Điện thoại</label>
                              <input type="text" name="phone" value="<?=$contact->phone;?>" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                              <label>Email</label>
                              <input type="text" name="email" value="<?=$contact->email;?>" class="form-control">
                           </div>
                           <div class="mb-3">
                              <label>Tiêu đề</label>
                              <input type="text" name="title" value="<?=$contact->title;?>" class="form-control">
                           </div>                         
                        </div>
                     </div>
                     <div class="mb-3">
                        <label>Nội dung câu hỏi</label>
                        <textarea name="content" rows="3" value="<?=$contact->content;?>" class="form-control"></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Trả lời</label>
                        <textarea name="replay_id" rows="5" class="form-control"></textarea>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>