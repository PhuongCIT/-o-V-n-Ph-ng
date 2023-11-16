<?php
$title = "Liên hệ";

use App\Models\Contact;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
   $contact = new Contact();
   //lấy từ form
   $contact->name = $_POST['name'];
   $contact->email = $_POST['email'];
   $contact->status = $_POST['status'];
   $contact->phone = $_POST['phone'];
   $contact->title = $_POST['title'];
   $contact->content = $_POST['content'];
   //tự sinh ra
   $contact->created_at = date('Y-m-d H:i:s');

   var_dump($contact);
   $contact->save();
   MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
   header("location:index.php?option=contact");
}
?>
<?php require_once "views/frontend/header.php" ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Liên hệ
            </li>

         </ol>
      </nav>
   </div>
</section>
<section class="dvp-maincontent py-2">
   <form action="index.php?option=contact" method="post" name="logincustomer">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <h3 class="text-center">THÔNG TIN LIÊN HỆ</h3>
               <div class="mb-3">
                  <h4>Số Điện Thoại: 0384311405</h4>
               </div>
               <div class="mb-3">
                  <h4>Email: daovanphuong010596@gmail.com</h4>
               </div>
               <div class="mb-3">
                  <h4>Địa Chỉ: 521 Bình Minh, Phan Hòa, Bắc Bình, Bình Thuận.</h4>
               </div>
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d897530.4447495332!2d107.73260543521974!3d10.8692587527645!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3176c5308d307157%3A0xde3bda9b728fe05b!2zVOG6oXAgSMOzYSBDw7QgxJDDumM!5e0!3m2!1svi!2s!4v1700082554806!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               <div class="mb-3">
               </div>
            </div>

            <div class="col-md-6">
               <h3 class="text-center">ĐỂ LẠI LIÊN HỆ DƯỚI ĐÂY CHÚNG TÔI SẼ TRẢ LỜI BẠN QUA EMAIL TRONG 24H</h3>

               <div class="mb-4">
                  <label for="name" class="text-main">Họ tên</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên">
               </div>
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại">
               </div>
               <div class="mb-3">
                  <label for="email" class="text-main">Email</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Nhập email">
               </div>
               <div class="mb-3">
                  <label for="title" class="text-main">Tiêu đề</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề">
               </div>
               <div class="mb-3">
                  <label for="content" class="text-main">Nội dung</label>
                  <textarea name="content" id="content" class="form-control" placeholder="Nhập nội dung liên hệ"></textarea>
               </div>
               <div class="mb-3">
                  <label>Trạng thái</label>
                  <select name="status" class="form-control">
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>

               <button type="submit" class="btn btn-sm btn-success" type="submit" name="THEM">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  GỬI LIÊN HỆ
               </button>

            </div>

         </div>
      </div>
   </form>
</section>
<?php require_once "views/frontend/footer.php" ?>