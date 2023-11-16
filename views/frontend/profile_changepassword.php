<?php

use App\Models\User;

$title = "Đổi mật khẩu";
$customer = User::where([['status', '=', 1], ['id', '=', $_SESSION['user_id']]])->first();
if (isset($_POST["CHANEGPASSWORD"])) {
   $password = $_POST['password_old'];
   $args = [
      ['password', '=', $password],

      ['status', '=', 1],
   ];
   $user = User::where($args)->first();
   if ($user !== null) {
      //Thanh cong
      $customer->password = $_POST['password'];
      $customer->updated_at = date('Y-m-d H:i:s');
      $customer->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      $customer->save();
      header("location:index.php?option=customer&logout=true");
   } else {
      //that bai
      $error = "Mật khẩu không hợp lệ";
   }
}
?>
<?php require_once "views/frontend/header.php" ?>
<section class="dvp-maincontent py-2">
   <form action="index.php?option=profile_changepassword.php" method="post" name="CHANEGPASSWORD">
      <div class="container">
         <div class="row">
            <div class="col-md-9 order-1 order-md-2">
               <h1 class="fs-2 text-main">Đổi mật khẩu</h1>
               <table class="table table-borderless">
                  <tr>
                     <td style="width:20%;">Mật khẩu cũ</td>
                     <td>
                        <input type="password" name="password_old" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Mật khẩu mới</td>
                     <td>
                        <input type="password" name="password" class="form-control" />
                     </td>
                  </tr>
                  <tr>
                     <td>Xác nhận mật khẩu</td>
                     <td>
                        <input type="password" name="password_re" class="form-control" />
                     </td>
                  </tr>
                  <tr>

                     <td>
                        <button class="btn btn-main" type="submit" name="CHANEGPASSWORD">
                           Đổi mật khẩu
                        </button>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </form>
</section>
<?php require_once "views/frontend/footer.php" ?>