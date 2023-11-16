<?php

use App\Models\User;
$title="Đổi địa chỉ";
$customer = User::where([['status', '=', 1], ['id', '=', $_SESSION['user_id']]])->first();
if (isset($_POST["CHANEGADD"])) {
   $address = $_POST['address_old'];
   $args = [
      ['address', '=', $address],

      ['status', '=', 1],
   ];
   $user = User::where($args)->first();
   if ($user !== null) {
      //Thanh cong
      $customer->address = $_POST['address'];
      $customer->updated_at = date('Y-m-d h:i:s');
      $customer->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
   
      $customer->save();
      header("location:index.php?option=profile");
   } else {
      //that bai
      $error = "Đỉa chỉ không hợp lệ";
   }
}
?>
<?php require_once "views/frontend/header.php"; ?>
<form action="index.php?option=profile_edit" method="post">
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.html">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Đổi địa chỉ</li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="dvp-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="call-login--register border-bottom">
               <ul class="nav nav-fills py-0 my-0">
                  <li class="nav-item">
                     <a class="nav-link">
                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                        <?= $customer->phone; ?>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?option=customer&login=true">Đăng nhập</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?option=customer&register=true">Đăng ký</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="index.php?option=profile"><?= $customer->name; ?></a>
                  </li>
               </ul>
            </div>
            <div class="col-md-9 order-1 order-md-2">
               <h1 class="fs-2 text-main">Thông tin tài khoản</h1>
               <table class="table table-borderless">
                  <tr>
                     <td style="width:20%;">Địa chỉ cũ</td>
                     <td>
                        <input type="text" name="address_old" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Đỉa chỉ mới</td>
                     <td>
                        <input type="text" name="address" class="form-control" />
                     </td>
                  </tr>

                  <tr>
                     <td></td>
                     <td>
                        <button class="btn btn-main" type="submit" name="CHANEGADD">
                           Đổi Địa chỉ
                        </button>
                        <?php echo $error??"";?>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </section>
   <?php require_once "views/frontend/footer.php"; ?>